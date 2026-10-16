<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CartService;
use DomainException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function index(): View
    {
        $summary = $this->cart->summary();

        return view('frontend.cart.index', [
            'cartSummary' => $summary,
            'recommended' => $this->recommended(collect($summary['items'])->pluck('product_id')),
        ]);
    }

    public function summary(): JsonResponse
    {
        return $this->respond();
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer'],
            'variant_id' => ['nullable', 'integer'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:'.CartService::MAX_QUANTITY],
        ]);

        return $this->attempt(fn () => $this->cart->add(
            (int) $data['product_id'],
            isset($data['variant_id']) ? (int) $data['variant_id'] : null,
            (int) ($data['quantity'] ?? 1),
        ));
    }

    public function update(Request $request, string $key): JsonResponse
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:'.CartService::MAX_QUANTITY],
        ]);

        return $this->attempt(fn () => $this->cart->setQuantity($key, (int) $data['quantity']));
    }

    public function destroy(string $key): JsonResponse
    {
        $this->cart->remove($key);

        return $this->respond('Item removed');
    }

    public function clear(): JsonResponse
    {
        $this->cart->clear();

        return $this->respond('Cart cleared');
    }

    public function applyCoupon(Request $request): JsonResponse
    {
        $data = $request->validate(['code' => ['required', 'string', 'max:40']]);

        return $this->attempt(function () use ($data) {
            $this->cart->applyCoupon($data['code']);

            return 'Coupon applied';
        });
    }

    public function removeCoupon(): JsonResponse
    {
        $this->cart->removeCoupon();

        return $this->respond('Coupon removed');
    }

    public function zone(Request $request): JsonResponse
    {
        $data = $request->validate(['zone' => ['required', 'string', 'max:30']]);

        return $this->attempt(function () use ($data) {
            $this->cart->setZone($data['zone']);

            return 'Delivery area updated';
        });
    }

    /** Runs a cart action and turns a refused action into a 422 the page can show as a message. */
    private function attempt(callable $action): JsonResponse
    {
        try {
            $message = $action();
        } catch (DomainException $e) {
            return $this->respond($e->getMessage(), false);
        }

        return $this->respond(is_string($message) ? $message : null);
    }

    private function respond(?string $message = null, bool $ok = true): JsonResponse
    {
        return response()->json([
            'ok' => $ok,
            'message' => $message,
            'cart' => $this->cart->summary(),
        ], $ok ? 200 : 422);
    }

    /** @param  Collection<int, int>  $inCart */
    private function recommended(Collection $inCart): Collection
    {
        $categoryIds = Product::query()->whereIn('id', $inCart)->pluck('category_id')->filter()->unique();

        $query = fn () => Product::active()
            ->with(['images', 'variants', 'category', 'brand'])
            ->whereNotIn('id', $inCart)
            ->orderByDesc('is_featured')
            ->latest('id');

        $picked = $categoryIds->isNotEmpty()
            ? $query()->whereIn('category_id', $categoryIds)->limit(4)->get()
            : collect();

        if ($picked->count() < 4) {
            $picked = $picked->concat(
                $query()->whereNotIn('id', $picked->pluck('id'))->limit(4 - $picked->count())->get()
            );
        }

        return $picked->values();
    }
}

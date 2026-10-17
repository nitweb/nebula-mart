<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishlistController extends Controller
{
    private const LIMIT = 100;

    public function index(Request $request): View
    {
        $ids = $request->user()->wishlists()->latest('id')->pluck('product_id')->all();

        $found = Product::active()
            ->with(['images', 'variants', 'category', 'brand'])
            ->whereIn('id', $ids)
            ->get()
            ->keyBy('id');

        $products = collect($ids)->map(fn ($id) => $found->get($id))->filter()->values();

        return view('frontend.account.wishlist', ['products' => $products]);
    }

    /** Adds the product to the signed-in customer's wishlist, or takes it off when it is already there. */
    public function toggle(Request $request): JsonResponse
    {
        $data = $request->validate(['product_id' => ['required', 'integer', 'exists:products,id']]);

        $user = $request->user();
        $existing = Wishlist::query()->where('user_id', $user->id)->where('product_id', $data['product_id'])->first();

        if ($existing) {
            $existing->delete();
            $wished = false;
        } else {
            if ($user->wishlists()->count() >= self::LIMIT) {
                return response()->json(['message' => 'Your wishlist is full. Please remove a few items first.'], 422);
            }

            $user->wishlists()->create(['product_id' => $data['product_id']]);
            $wished = true;
        }

        return response()->json([
            'wished' => $wished,
            'count' => $user->wishlists()->count(),
            'message' => $wished ? 'Saved to wishlist' : 'Removed from wishlist',
        ]);
    }
}

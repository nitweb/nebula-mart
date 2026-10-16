<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CouponController extends Controller
{
    public function index(): View
    {
        return view('admin.coupons.index', [
            'coupons' => Coupon::query()->latest('id')->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.coupons.create', $this->formData());
    }

    public function store(CouponRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $coupon = Coupon::create($this->payload($request));
            $this->syncTargets($coupon, $request);
        });

        return to_route('admin.coupons.index')->with('success', 'Coupon saved');
    }

    public function edit(Coupon $coupon): View
    {
        $coupon->load(['categories:id', 'products:id']);

        return view('admin.coupons.edit', $this->formData() + ['coupon' => $coupon]);
    }

    public function update(CouponRequest $request, Coupon $coupon): RedirectResponse
    {
        DB::transaction(function () use ($request, $coupon) {
            $coupon->update($this->payload($request));
            $this->syncTargets($coupon, $request);
        });

        return to_route('admin.coupons.index')->with('success', 'Coupon updated');
    }

    public function toggle(Coupon $coupon): RedirectResponse
    {
        $coupon->update(['is_active' => ! $coupon->is_active]);

        return back()->with('success', $coupon->is_active ? 'Coupon enabled' : 'Coupon disabled');
    }

    public function destroy(Coupon $coupon): RedirectResponse
    {
        $coupon->delete();

        return to_route('admin.coupons.index')->with('success', 'Coupon deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function formData(): array
    {
        return [
            'categoryOptions' => Category::orderBy('name')->get(['id', 'name']),
            'productOptions' => Product::active()->orderBy('name')->get(['id', 'name']),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function payload(CouponRequest $request): array
    {
        return $request->safe()->except(['categories', 'products']);
    }

    private function syncTargets(Coupon $coupon, CouponRequest $request): void
    {
        $coupon->categories()->sync($request->input('applies_to') === 'categories' ? $request->input('categories', []) : []);
        $coupon->products()->sync($request->input('applies_to') === 'products' ? $request->input('products', []) : []);
    }
}

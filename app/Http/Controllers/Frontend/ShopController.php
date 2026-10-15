<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        return $this->listing($request);
    }

    public function category(Request $request, Category $category): View
    {
        abort_unless($category->is_active, 404);

        return $this->listing($request, $category);
    }

    public function brand(Request $request, Brand $brand): View
    {
        abort_unless($brand->is_active, 404);

        return $this->listing($request, null, $brand);
    }

    private function listing(Request $request, ?Category $category = null, ?Brand $brand = null): View
    {
        $scope = fn (): Builder => Product::active()
            ->when($category, fn (Builder $q) => $q->inCategory($category->id))
            ->when($brand, fn (Builder $q) => $q->where('brand_id', $brand->id));

        $search = trim((string) $request->query('q', ''));
        $brands = array_filter((array) $request->query('brand', []), 'is_string');
        $colors = array_filter((array) $request->query('color', []), 'is_string');
        $sizes = array_filter((array) $request->query('size', []), 'is_string');
        $min = $request->query('min') !== null && $request->query('min') !== '' ? max(0, (float) $request->query('min')) : null;
        $max = $request->query('max') !== null && $request->query('max') !== '' ? max(0, (float) $request->query('max')) : null;
        $sort = in_array($request->query('sort'), ['new', 'pop', 'lo', 'hi'], true) ? $request->query('sort') : 'new';

        $products = $scope()
            ->with(['images', 'variants', 'category', 'brand'])
            ->when($search !== '', function (Builder $q) use ($search) {
                $q->where(function (Builder $w) use ($search) {
                    $w->where('name', 'like', "%{$search}%")
                        ->orWhere('short_description', 'like', "%{$search}%")
                        ->orWhere('tags', 'like', "%{$search}%")
                        ->orWhereHas('brand', fn (Builder $b) => $b->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('category', fn (Builder $c) => $c->where('name', 'like', "%{$search}%"));
                });
            })
            ->when($brands, fn (Builder $q) => $q->whereHas('brand', fn (Builder $b) => $b->whereIn('slug', $brands)))
            ->when($colors || $sizes, fn (Builder $q) => $q->whereHas('variants', function (Builder $v) use ($colors, $sizes) {
                $v->when($colors, fn (Builder $x) => $x->whereIn('color', $colors))
                    ->when($sizes, fn (Builder $x) => $x->whereIn('size', $sizes));
            }))
            ->when($min !== null, fn (Builder $q) => $q->where('price', '>=', $min))
            ->when($max !== null, fn (Builder $q) => $q->where('price', '<=', $max))
            ->when($request->boolean('flash'), fn (Builder $q) => $q->where('is_flash', true))
            ->when($sort === 'lo', fn (Builder $q) => $q->orderBy('price')->orderByDesc('id'))
            ->when($sort === 'hi', fn (Builder $q) => $q->orderByDesc('price')->orderByDesc('id'))
            ->when($sort === 'pop', fn (Builder $q) => $q->orderByDesc('sold_count')->orderByDesc('id'))
            ->when($sort === 'new', fn (Builder $q) => $q->orderByDesc('id'))
            ->paginate(12)
            ->withQueryString();

        // Facets are built from everything in the current category/brand, before the sidebar filters are applied.
        $brandCounts = $scope()->whereNotNull('brand_id')->selectRaw('brand_id, count(*) as total')->groupBy('brand_id')->pluck('total', 'brand_id');
        $variantQuery = fn () => ProductVariant::whereIn('product_id', $scope()->select('id'));

        $trail = [];

        for ($node = $category; $node; $node = $node->parent) {
            array_unshift($trail, $node);
        }

        return view('frontend.shop.index', [
            'category' => $category,
            'brand' => $brand,
            'trail' => $trail,
            'products' => $products,
            'facetBrands' => Brand::whereIn('id', $brandCounts->keys())->orderBy('name')->get()->each(fn (Brand $b) => $b->facet_count = $brandCounts[$b->id]),
            'facetColors' => $variantQuery()->whereNotNull('color')->distinct()->orderBy('color')->pluck('color'),
            'facetSizes' => $variantQuery()->whereNotNull('size')->distinct()->orderBy('size')->pluck('size'),
            'priceCeiling' => (int) ceil((float) $scope()->max('price')),
            'filters' => compact('search', 'brands', 'colors', 'sizes', 'min', 'max', 'sort'),
            'trailIds' => array_map(fn (Category $c) => $c->id, $trail),
        ]);
    }
}

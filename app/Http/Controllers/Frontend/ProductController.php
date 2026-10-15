<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(Product $product): View
    {
        abort_unless($product->status === 'active', 404);

        $product->load(['images', 'variants', 'category.parent', 'brand']);

        $trail = [];

        for ($node = $product->category; $node; $node = $node->parent) {
            array_unshift($trail, $node);
        }

        $related = Product::active()
            ->with(['images', 'variants', 'category', 'brand'])
            ->whereKeyNot($product->id)
            ->when($product->category_id, fn ($q) => $q->where('category_id', $product->category_id))
            ->latest('id')
            ->limit(4)
            ->get();

        return view('frontend.product.show', [
            'product' => $product,
            'trail' => $trail,
            'related' => $related,
        ]);
    }
}

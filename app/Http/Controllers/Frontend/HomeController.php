<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    private const RELATIONS = ['images', 'variants', 'category', 'brand'];

    public function index(): View
    {
        $homeCategories = Category::homeList();

        if ($homeCategories->isEmpty()) {
            $homeCategories = Category::menuTree();
        }

        $categorySections = $homeCategories
            ->map(fn (Category $category) => [
                'category' => $category,
                'products' => Product::active()->inCategory($category->id)->with(self::RELATIONS)->latest('id')->limit(8)->get(),
            ])
            ->filter(fn (array $section) => $section['products']->isNotEmpty())
            ->take(4)
            ->values();

        return view('frontend.dashboard.index', [
            'banners' => Banner::active()->get(),
            'homeCategories' => $homeCategories,
            'homeBrands' => Brand::active()->featured()->get(),
            'flashProducts' => Product::active()->where('is_flash', true)->with(self::RELATIONS)->latest('id')->limit(8)->get(),
            'featuredProducts' => Product::active()->where('is_featured', true)->with(self::RELATIONS)->latest('id')->limit(8)->get(),
            'newProducts' => Product::active()->where('is_new', true)->with(self::RELATIONS)->latest('id')->limit(8)->get(),
            'categorySections' => $categorySections,
        ]);
    }
}

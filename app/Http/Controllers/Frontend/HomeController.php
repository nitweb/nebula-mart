<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $homeCategories = Category::homeList();

        if ($homeCategories->isEmpty()) {
            $homeCategories = Category::menuTree();
        }

        return view('frontend.dashboard.index', [
            'banners' => Banner::active()->get(),
            'homeCategories' => $homeCategories,
            'homeBrands' => Brand::active()->featured()->get(),
        ]);
    }
}
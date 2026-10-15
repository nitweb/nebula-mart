<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashDeal;
use Illuminate\View\View;

class FlashDealController extends Controller
{
    public function index(): View
    {
        $sections = FlashDeal::live()
            ->map(fn (FlashDeal $deal) => [
                'deal' => $deal,
                'end' => $deal->windowAt()[1],
                'products' => $deal->activeProducts(),
            ])
            ->filter(fn (array $section) => $section['products']->isNotEmpty())
            ->values();

        return view('frontend.flash_deals.index', [
            'sections' => $sections,
            'upcoming' => FlashDeal::upcoming()->take(4),
        ]);
    }
}

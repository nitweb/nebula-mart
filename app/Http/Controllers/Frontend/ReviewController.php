<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $reviews = $user->reviews()->with('product.images')->latest('id')->get();
        $reviewedIds = $reviews->pluck('product_id')->all();

        $toReview = Product::query()
            ->with('images')
            ->whereIn('id', $this->purchasedProductIds($request))
            ->whereNotIn('id', $reviewedIds)
            ->get();

        return view('frontend.account.reviews', ['reviews' => $reviews, 'toReview' => $toReview]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'title' => ['nullable', 'string', 'max:120'],
            'body' => ['nullable', 'string', 'max:1000'],
        ]);

        if (! in_array((int) $data['product_id'], $this->purchasedProductIds($request), true)) {
            return back()->with('error', 'You can only review products from your delivered orders.');
        }

        Review::updateOrCreate(
            ['user_id' => $request->user()->id, 'product_id' => $data['product_id']],
            ['rating' => $data['rating'], 'title' => $data['title'] ?? null, 'body' => $data['body'] ?? null],
        );

        return to_route('account.reviews')->with('status', 'Thank you! Your review is live.');
    }

    public function destroy(Request $request, Review $review): RedirectResponse
    {
        abort_unless($review->user_id === $request->user()->id, 404);

        $review->delete();

        return back()->with('status', 'Review deleted.');
    }

    /** @return list<int> products from this customer's delivered orders */
    private function purchasedProductIds(Request $request): array
    {
        $orderIds = $request->user()->customerOrders()->where('status', 'delivered')->pluck('id');

        return OrderItem::query()
            ->whereIn('order_id', $orderIds)
            ->whereNotNull('product_id')
            ->pluck('product_id')
            ->unique()
            ->map(fn ($id) => (int) $id)
            ->values()
            ->all();
    }
}

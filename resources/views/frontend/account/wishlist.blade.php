@extends('frontend.account.layout')

@section('frontend_title', 'Wishlist | '.$setting('store_name'))
@section('account_title', 'Wishlist')
@section('account_sub', 'Items you saved for later.')

@section('account_body')
    <div data-wishlist-page>
        @if ($products->isNotEmpty())
            <ul class="grid grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-5">
                @foreach ($products as $product)
                    @include('frontend.partials.product_card', ['product' => $product])
                @endforeach
            </ul>
        @endif

        <div data-wishlist-empty @if ($products->isNotEmpty()) hidden @endif class="bg-white border border-line rounded-3xl p-6 lg:p-8 text-center">
            <p class="font-display text-2xl">Your wishlist is empty</p>
            <p class="mt-2 text-ink/70">Tap the heart on any product to save it here.</p>
            <a href="{{ route('shop') }}" class="inline-flex items-center justify-center bg-primary hover:bg-primary-dark text-white font-extrabold rounded-xl px-6 py-3.5 transition-colors mt-5">Browse products</a>
        </div>
    </div>
@endsection

@extends('frontend.account.layout')

@section('frontend_title', 'My reviews | '.$setting('store_name'))
@section('account_title', 'My reviews')
@section('account_sub', 'Tell others what you think about the products you received.')

@section('account_body')
    @php
        $card = 'bg-white border border-line rounded-3xl p-6 lg:p-8';
        $field = 'w-full rounded-xl border border-line px-4 py-3 bg-white focus:outline-none focus:shadow-md';
        $labels = [5 => '5 - Excellent', 4 => '4 - Good', 3 => '3 - Okay', 2 => '2 - Poor', 1 => '1 - Terrible'];
    @endphp

    <div class="grid gap-6">
        <section class="{{ $card }}" aria-labelledby="h-todo">
            <h2 id="h-todo" class="font-display font-extrabold text-2xl">Waiting for your review</h2>

            @forelse ($toReview as $product)
                <article class="mt-5 pt-5 {{ $loop->first ? '' : 'border-t-2 border-dashed border-line' }}">
                    <div class="flex items-center gap-4">
                        <img src="{{ $product->cover_url }}" alt="" width="300" height="300" class="w-16 h-16 rounded-lg object-cover border border-line" loading="lazy">
                        <a href="{{ $product->url }}" class="font-bold hover:text-primary">{{ $product->name }}</a>
                    </div>
                    <form method="POST" action="{{ route('account.reviews.store') }}" class="grid sm:grid-cols-2 gap-4 mt-4" novalidate>
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @include('frontend.account.partials.review_fields', ['review' => null, 'labels' => $labels, 'field' => $field])
                        <div class="sm:col-span-2">
                            <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-extrabold rounded-xl px-6 py-2.5 transition-colors">Post review</button>
                        </div>
                    </form>
                </article>
            @empty
                <p class="mt-3 text-ink/70">Nothing to review right now. Products from your delivered orders will show up here.</p>
            @endforelse
        </section>

        <section class="{{ $card }}" aria-labelledby="h-done">
            <h2 id="h-done" class="font-display font-extrabold text-2xl">Your reviews</h2>

            @forelse ($reviews as $review)
                <article class="mt-5 pt-5 {{ $loop->first ? '' : 'border-t-2 border-dashed border-line' }}">
                    <div class="flex items-center gap-4">
                        <img src="{{ $review->product->cover_url }}" alt="" width="300" height="300" class="w-14 h-14 rounded-lg object-cover border border-line" loading="lazy">
                        <div class="min-w-0">
                            <a href="{{ $review->product->url }}" class="font-bold hover:text-primary">{{ $review->product->name }}</a>
                            <p class="acct-stars" aria-label="{{ $review->rating }} out of 5">{{ str_repeat('★', $review->rating) }}<span>{{ str_repeat('★', 5 - $review->rating) }}</span></p>
                        </div>
                    </div>
                    @if ($review->title)<p class="font-bold mt-3">{{ $review->title }}</p>@endif
                    @if ($review->body)<p class="text-sm text-ink/80 mt-1">{{ $review->body }}</p>@endif

                    <div class="flex flex-wrap items-start gap-3 mt-3">
                        <details class="flex-1 min-w-[16rem]">
                            <summary class="cursor-pointer font-bold text-sm underline underline-offset-4">Edit review</summary>
                            <form method="POST" action="{{ route('account.reviews.store') }}" class="grid sm:grid-cols-2 gap-4 mt-4" novalidate>
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $review->product_id }}">
                                @include('frontend.account.partials.review_fields', ['review' => $review, 'labels' => $labels, 'field' => $field])
                                <div class="sm:col-span-2">
                                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-extrabold rounded-xl px-6 py-2.5 transition-colors">Save review</button>
                                </div>
                            </form>
                        </details>
                        <form method="POST" action="{{ route('account.reviews.destroy', $review) }}" onsubmit="return confirm('Delete this review?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 rounded-lg border border-line font-bold text-sm text-danger hover:bg-primary-soft">Delete</button>
                        </form>
                    </div>
                </article>
            @empty
                <p class="mt-3 text-ink/70">You have not written a review yet.</p>
            @endforelse
        </section>
    </div>
@endsection

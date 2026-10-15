@if ($flashDeal && $flashProducts->isNotEmpty())
<section class="max-w-7xl mx-auto px-4 lg:px-6 mt-14" aria-labelledby="h-flash">

    <div class="flex flex-wrap items-end justify-between mb-6 gap-x-4 gap-y-4">

        <div>
            <h2 id="h-flash" class="font-display font-extrabold text-3xl">Flash deals</h2>
            <p class="text-ink/65 mt-1">{{ $flashDeal->title }}: prices go back to normal when the timer ends.</p>
        </div>

        <div class="flash-side">

            @if ($flashDeal->show_countdown)
                @include('frontend.partials.flash_countdown', ['end' => $flashDeal->windowAt()[1]])
            @endif

            <a href="{{ route('flash-deals') }}" class="font-bold underline underline-offset-4 shrink-0">View all deals</a>

        </div>

    </div>

    <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">
        @foreach ($flashProducts as $product)
            @include('frontend.partials.product_card', ['product' => $product])
        @endforeach
    </ul>

</section>
@endif

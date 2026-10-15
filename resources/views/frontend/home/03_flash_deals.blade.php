@if ($flashProducts->isNotEmpty())
<section class="max-w-7xl mx-auto px-4 lg:px-6 mt-14" aria-labelledby="h-flash">

    <div class="flex flex-wrap items-end justify-between mb-6 gap-x-4 gap-y-4">

        <div>
            <h2 id="h-flash" class="font-display font-extrabold text-3xl">Flash deals</h2>
            <p class="text-ink/65 mt-1">Prices drop back to normal at midnight.</p>
        </div>

        <div class="flash-side">

            <div id="flash-countdown" class="fc" role="timer" aria-live="off" aria-label="Time left in today's flash deals">

                <span class="fc__label">
                    <svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true">
                        <path fill="currentColor" d="M13 2 4 14h6l-1 8 9-12h-6z" />
                    </svg>
                    Ends in
                </span>

                <span class="fc__box">
                    <b data-fc="h">00</b>
                    <small>h</small>
                </span>

                <span class="fc__sep" aria-hidden="true"></span>

                <span class="fc__box">
                    <b data-fc="m">00</b>
                    <small>m</small>
                </span>

                <span class="fc__sep" aria-hidden="true"></span>

                <span class="fc__box fc__box--s">
                    <b data-fc="s">00</b>
                    <small>s</small>
                </span>

            </div>

            <a href="{{ url('/shop?flash=1') }}" class="font-bold underline underline-offset-4 shrink-0">View all deals</a>

        </div>

    </div>

    <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">
        @foreach ($flashProducts as $product)
            @include('frontend.partials.product_card', ['product' => $product])
        @endforeach
    </ul>

</section>
@endif

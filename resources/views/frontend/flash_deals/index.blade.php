@extends('frontend.dashboard.dashboard')

@section('frontend_title', 'Flash deals | '.$setting('store_name'))
@section('frontend_description', 'Limited-time prices on selected products. Grab them before the timer runs out.')

@section('frontend_contents')

<section class="bg-primary border-b-4 border-line relative overflow-hidden">
    <span class="absolute -right-10 -top-12 w-56 h-56 rounded-full bg-primary"></span>
    <span class="absolute right-40 -bottom-14 w-40 h-40 rounded-full bg-accent"></span>
    <span class="absolute right-24 top-8 w-8 h-8 rounded-full bg-accent"></span>
    <div class="max-w-7xl mx-auto px-4 lg:px-6 py-10 relative text-white">
        <nav aria-label="Breadcrumb" class="text-sm">
            <ol class="flex flex-wrap gap-2">
                <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                <li aria-hidden="true">/</li>
                <li aria-current="page" class="font-bold">Flash deals</li>
            </ol>
        </nav>
        <h1 class="font-display font-extrabold text-4xl lg:text-5xl mt-3">Flash deals</h1>
        <p class="mt-2 max-w-lg opacity-90">Limited-time prices on selected products. Grab them before the timer runs out.</p>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 lg:px-6">

    @forelse ($sections as $section)
        <section class="mt-10" aria-labelledby="h-deal-{{ $section['deal']->id }}">
            <div class="flex flex-wrap items-end justify-between mb-6 gap-x-4 gap-y-4">
                <div>
                    <h2 id="h-deal-{{ $section['deal']->id }}" class="font-display font-extrabold text-3xl">{{ $section['deal']->title }}</h2>
                    <p class="text-ink/65 mt-1">{{ $section['products']->count() }} {{ \Illuminate\Support\Str::plural('product', $section['products']->count()) }} on offer.</p>
                </div>
                @if ($section['deal']->show_countdown)
                    <div class="flash-side">
                        @include('frontend.partials.flash_countdown', ['end' => $section['end']])
                    </div>
                @endif
            </div>

            <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">
                @foreach ($section['products'] as $product)
                    @include('frontend.partials.product_card', ['product' => $product])
                @endforeach
            </ul>
        </section>
    @empty
        <div class="mt-10 rounded-3xl border border-line bg-white p-10 text-center">
            <h2 class="font-display font-extrabold text-2xl">No flash deals right now</h2>
            <p class="text-ink/65 mt-2">New deals drop regularly. In the meantime, have a look at everything else in the shop.</p>
            <a href="{{ url('/shop') }}" class="inline-block mt-5 bg-primary text-white font-extrabold rounded-xl px-6 py-3">Browse the shop</a>
        </div>
    @endforelse

    @if ($upcoming->isNotEmpty())
        <section class="mt-14 mb-4" style="padding-bottom: 4.75rem;" aria-labelledby="h-upcoming">
            <h2 id="h-upcoming" class="font-display font-extrabold text-2xl mb-4">Coming up</h2>
            <ul class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($upcoming as $deal)
                    <li class="rounded-2xl border border-line bg-white p-5">
                        <b class="block">{{ $deal->title }}</b>
                        <span class="text-sm text-ink/65">Starts {{ $deal->nextStart()->format('D, d M · g:i A') }}</span>
                    </li>
                @endforeach
            </ul>
        </section>
    @else
        <div style="height:4.75rem"></div>
    @endif

</div>

@endsection

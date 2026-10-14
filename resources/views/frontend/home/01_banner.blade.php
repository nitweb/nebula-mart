@if ($banners->isNotEmpty())
    <section id="hero" aria-roledescription="carousel" aria-label="Featured offers" class="relative overflow-hidden border-b-4 border-line">

        <div id="hero-track" class="flex transition-transform duration-700 ease-out">
            @foreach ($banners as $banner)
                <a href="{{ $banner->link ?: '#' }}" class="slide block min-w-full" role="group" aria-roledescription="slide" aria-label="{{ $loop->iteration }} of {{ $loop->count }}">
                    <img src="{{ $banner->image_url }}" alt="{{ $banner->alt_text }}" width="1942" height="809" loading="{{ $loop->first ? 'eager' : 'lazy' }}" @if ($loop->first) fetchpriority="high" @endif class="w-full h-[200px] sm:h-[300px] lg:h-[500px] object-cover">
                </a>
            @endforeach
        </div>

        <button type="button" data-prev class="absolute left-3 top-1/2 -translate-y-1/2 w-11 h-11 grid place-items-center rounded-full bg-white border border-line hover:bg-accent" aria-label="Previous slide">
            <svg class="w-5 h-5 rotate-90">
                <use href="#i-chev" />
            </svg>
        </button>

        <button type="button" data-next class="absolute right-3 top-1/2 -translate-y-1/2 w-11 h-11 grid place-items-center rounded-full bg-white border border-line hover:bg-accent" aria-label="Next slide">
            <svg class="w-5 h-5 -rotate-90">
                <use href="#i-chev" />
            </svg>
        </button>

        <div class="absolute bottom-4 inset-x-0 flex justify-center gap-2">
            @foreach ($banners as $banner)
                <button type="button" data-dot class="h-3 w-3 rounded-full bg-white border border-line transition-all" aria-label="Go to slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>

    </section>
@endif

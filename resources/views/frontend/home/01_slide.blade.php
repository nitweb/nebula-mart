<section id="hero" aria-roledescription="carousel" aria-label="Featured offers" class="relative overflow-hidden border-b-4 border-line">

    <div id="hero-track" class="flex transition-transform duration-700 ease-out">

        <a href="shop.html" class="slide block min-w-full" role="group" aria-roledescription="slide" aria-label="1 of 3">
            <img src="{{ asset('assets/frontend/images/hero/slider_01.webp') }}" alt="Nirvana makeup: unleash your true color" width="1942" height="809" loading="eager" fetchpriority="high" class="w-full h-[200px] sm:h-[300px] lg:h-[500px] object-cover">
        </a>

        <a href="shop.html" class="slide block min-w-full" role="group" aria-roledescription="slide" aria-label="2 of 3">
            <img src="{{ asset('assets/frontend/images/hero/slider_02.webp') }}" alt="Himalaya personal care products with up to 50% off" width="1942" height="809" loading="lazy" class="w-full h-[200px] sm:h-[300px] lg:h-[500px] object-cover">
        </a>

        <a href="shop.html" class="slide block min-w-full" role="group" aria-roledescription="slide" aria-label="3 of 3">
            <img src="{{ asset('assets/frontend/images/hero/slider_03.webp') }}" alt="Treasure of Glow: free delivery on orders of BDT 1999+ and up to 72% off" width="1942" height="809" loading="lazy" class="w-full h-[200px] sm:h-[300px] lg:h-[500px] object-cover">
        </a>

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
        <button type="button" data-dot class="h-3 w-3 rounded-full bg-white border border-line transition-all" aria-label="Go to slide 1"></button>
        <button type="button" data-dot class="h-3 w-3 rounded-full bg-white border border-line transition-all" aria-label="Go to slide 2"></button>
        <button type="button" data-dot class="h-3 w-3 rounded-full bg-white border border-line transition-all" aria-label="Go to slide 3"></button>
    </div>

</section>

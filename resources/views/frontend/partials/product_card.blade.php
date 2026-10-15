@php
    $fmt = fn ($n) => number_format($n, floor($n) == $n ? 0 : 2);
    $pName = $product->name;
@endphp
<li>
    <article class="group relative bg-white border border-line rounded-2xl overflow-hidden hover:shadow-md transition-shadow flex flex-col h-full">
        <div class="relative overflow-hidden bg-primary-soft">
            <a href="{{ $product->url }}" class="block aspect-square" tabindex="-1" aria-hidden="true">
                <img src="{{ $product->cover_url }}" alt="{{ $pName }}" width="600" height="600" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </a>
            @if ($product->discount_percent)
                <span class="absolute top-3 left-3 bg-primary text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">-{{ $product->discount_percent }}%</span>
            @endif
            <div class="card-actions">
                <button type="button" class="wish w-9 h-9 grid place-items-center rounded-full bg-white border border-line hover:bg-primary hover:text-white" aria-label="Add {{ $pName }} to wishlist" aria-pressed="false">
                    <svg class="w-5 h-5"><use href="#i-heart" /></svg>
                </button>
                <button type="button" class="qv" aria-label="Quick view {{ $pName }}" data-name="{{ $pName }}" data-price="{{ $fmt($product->price) }}" data-old="{{ $product->discount_percent ? $fmt($product->compare_price) : '' }}" data-img="{{ $product->cover_url }}" data-href="{{ $product->url }}" data-brand="{{ $product->brand?->name }}">
                    <svg class="w-5 h-5"><use href="#i-eye" /></svg>
                </button>
            </div>
        </div>
        <div class="p-4 flex flex-col flex-1">
            @if ($product->category || $product->brand)
                <div class="flex items-center justify-between gap-2 text-xs font-bold">
                    <span class="text-primary truncate">{{ $product->category?->name }}</span>
                    @if ($product->brand)
                        <a href="{{ $product->brand->url }}" class="text-ink/60 hover:text-primary truncate" style="max-width:50%">{{ $product->brand->name }}</a>
                    @endif
                </div>
            @endif
            <h3 class="font-bold leading-snug mt-1 line-clamp-2">
                <a href="{{ $product->url }}" class="hover:text-primary">{{ $pName }}</a>
            </h3>
            @if ($product->short_description)
                <p class="ldesc hidden text-sm text-ink/70 mt-2">{{ $product->short_description }}</p>
            @endif
            <div class="mt-auto pt-3 flex items-baseline gap-2">
                <span class="font-display font-extrabold text-xl">৳{{ $fmt($product->price) }}</span>
                @if ($product->discount_percent)
                    <s class="text-sm text-ink/50">৳{{ $fmt($product->compare_price) }}</s>
                @endif
            </div>
        </div>
        @if (! $product->in_stock)
            <span class="card-cart" style="display:block;text-align:center;opacity:.55;cursor:not-allowed">Out of stock</span>
        @elseif ($product->has_variants)
            <a href="{{ $product->url }}" class="card-cart" style="display:block;text-align:center">Select options</a>
        @else
            <button type="button" class="addcart card-cart" aria-label="Add {{ $pName }} to cart">Add to cart</button>
        @endif
    </article>
</li>

@if ($homeBrands->isNotEmpty())
<section class="max-w-7xl mx-auto px-4 lg:px-6 mt-14" aria-labelledby="h-brands">

    <div class="flex items-end justify-between mb-6 gap-4">
        <h2 id="h-brands" class="font-display font-extrabold text-3xl">Top brands</h2>
    </div>

    <ul style="display:grid;grid-template-columns:repeat(auto-fill,minmax(9.5rem,1fr));gap:.75rem">
        @foreach ($homeBrands as $brand)
            <li>
                <a href="{{ $brand->url }}" title="{{ $brand->name }}" class="flex flex-col items-center justify-center gap-3 bg-white border border-line rounded-2xl p-4 hover:shadow-md hover:-translate-y-0.5 transition-all h-full">
                    @if ($brand->logo)
                        <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}" loading="lazy" style="width:5.5rem;height:5.5rem;object-fit:contain">
                    @else
                        <span class="grid place-items-center rounded-2xl bg-primary/10 text-primary font-display font-extrabold text-3xl" style="width:5.5rem;height:5.5rem">{{ mb_strtoupper(mb_substr($brand->name, 0, 1)) }}</span>
                    @endif
                    <span class="font-bold text-sm text-center">{{ $brand->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>

</section>
@endif

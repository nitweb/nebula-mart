@foreach ($items as $item)
    @if ($item->children->isEmpty())
        <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
    @else
        <li>
            <details>
                <summary class="flex justify-between items-center cursor-pointer">
                    {{ $item->name }}
                    <svg class="chev w-5 h-5 transition-transform">
                        <use href="#i-chev" />
                    </svg>
                </summary>
                <ul class="pt-2.5 pl-3 grid gap-2.5">
                    <li><a href="{{ $item->url }}">All {{ $item->name }}</a></li>
                    @include('frontend.dashboard.layouts.partials.mobile_links', ['items' => $item->children])
                </ul>
            </details>
        </li>
    @endif
@endforeach

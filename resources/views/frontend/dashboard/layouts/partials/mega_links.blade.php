@foreach ($items as $item)
    <li>
        <a href="{{ $item->url }}" class="link-u">{{ $item->name }}</a>
        @if ($item->children->isNotEmpty())
            <ul class="grid gap-1.5 mt-1.5 pl-3 text-sm text-ink/70">
                @include('frontend.dashboard.layouts.partials.mega_links', ['items' => $item->children])
            </ul>
        @endif
    </li>
@endforeach

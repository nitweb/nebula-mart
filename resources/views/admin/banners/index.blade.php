@extends('admin.dashboard.dashboard')
@section('admin_title', 'Banners & Sliders · Nebula Mart Admin')
@section('admin_contents')

    <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Banners & Sliders</h1>
            <p class="text-ink/55 mt-1">Control homepage hero slider.</p>
        </div>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
            <svg class="ic ic-sm">
                <use href="#i-plus" />
            </svg>Add banner
        </a>
    </div>

    @if (session('success'))
        <div class="card p-4 text-success font-bold">{{ session('success') }}</div>
    @endif

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
        @forelse ($banners as $banner)
            <article class="card overflow-hidden group">
                <div class="relative aspect-[1942/809] bg-bg">
                    <img src="{{ $banner->image_url }}" class="w-full h-full object-cover" alt="{{ $banner->alt_text }}">
                    <span class="absolute top-3 left-3">
                        <span class="badge {{ $banner->is_active ? 'b-success' : 'b-muted' }}">{{ $banner->is_active ? 'Active' : 'Draft' }}</span>
                    </span>
                    <span class="absolute top-3 right-3 badge b-muted">#{{ $banner->sort_order }}</span>
                </div>
                <div class="p-5 flex items-center justify-between gap-3">
                    <div>
                        <p class="font-bold">{{ $banner->alt_text }}</p>
                        <p class="text-xs text-ink/50">{{ $banner->link ?: 'No link' }}</p>
                    </div>
                    <div class="flex gap-1">
                        <a href="{{ route('admin.banners.edit', $banner) }}" class="icon-btn">
                            <svg class="ic">
                                <use href="#i-edit" />
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('admin.banners.destroy', $banner) }}" onsubmit="return confirm('Delete this banner?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-btn danger">
                                <svg class="ic">
                                    <use href="#i-trash" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <p class="text-ink/55">No banners yet.</p>
        @endforelse
    </div>

@endsection

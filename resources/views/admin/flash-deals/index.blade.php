@extends('admin.dashboard.dashboard')
@section('admin_title', 'Flash Deals · Nebula Mart Admin')
@section('admin_contents')

    <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Flash Deals</h1>
            <p class="text-ink/55 mt-1">Time-limited offers shown with a countdown on the storefront.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.flash-deals.create') }}" class="btn btn-primary">
                <svg class="ic ic-sm"><use href="#i-plus" /></svg>New flash deal
            </a>
        </div>
    </div>

    <section class="card">
        <div class="flex flex-wrap items-center gap-3 p-5 border-b border-line">
            <div class="input-group flex-1 min-w-[220px] max-w-sm">
                <svg class="ic"><use href="#i-search" /></svg>
                <input class="input" placeholder="Search…" data-table-search="#tbl">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="tbl" id="tbl">
                <thead>
                    <tr>
                        <th>Campaign</th>
                        <th>Schedule</th>
                        <th>Products</th>
                        <th>Discount</th>
                        <th>Status</th>
                        <th>Active</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deals as $deal)
                        @php
                            $phase = $deal->phase();
                            $badge = ['live' => ['b-success', 'Live'], 'scheduled' => ['b-info', 'Scheduled'], 'ended' => ['b-muted', 'Ended'], 'inactive' => ['b-muted', 'Inactive']][$phase];
                            $from = $deal->startsAtLocal();
                            $to = $deal->endsAtLocal();
                        @endphp
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <span class="w-11 h-11 rounded-xl bg-accent/20 text-accent-dark grid place-items-center"><svg class="ic"><use href="#i-zap" /></svg></span>
                                    <b>{{ $deal->title }}</b>
                                </div>
                            </td>
                            <td>
                                @if ($deal->repeat_daily)
                                    Daily {{ $from->format('g:i A') }} – {{ $to->format('g:i A') }}
                                @else
                                    {{ $from->format('d M, g:i A') }} – {{ $to->format('d M, g:i A') }}
                                @endif
                            </td>
                            <td><b>{{ $deal->items_count }}</b> {{ \Illuminate\Support\Str::plural('product', $deal->items_count) }}</td>
                            <td><b>Up to {{ rtrim(rtrim(number_format((float) $deal->items_max_discount_percent, 2), '0'), '.') }}%</b></td>
                            <td><span class="badge {{ $badge[0] }}">{{ $badge[1] }}</span></td>
                            <td>
                                <form method="POST" action="{{ route('admin.flash-deals.toggle', $deal) }}">
                                    @csrf
                                    @method('PATCH')
                                    <label class="switch"><input type="checkbox" @checked($deal->is_active) onchange="this.form.submit()"><i></i></label>
                                </form>
                            </td>
                            <td>
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.flash-deals.edit', $deal) }}" class="icon-btn" title="Edit">
                                        <svg class="ic"><use href="#i-edit" /></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.flash-deals.destroy', $deal) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="icon-btn danger" data-delete="{{ $deal->title }}" title="Delete">
                                            <svg class="ic"><use href="#i-trash" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-ink/55">No flash deals yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($deals->hasPages())
            <div class="flex flex-wrap items-center justify-between gap-3 px-5 py-4 border-t border-line">
                <p class="text-sm text-ink/55">Showing <b class="text-ink">{{ $deals->firstItem() }}–{{ $deals->lastItem() }}</b> of <b class="text-ink">{{ $deals->total() }}</b> results</p>
                <div class="pg flex items-center gap-1">
                    @if ($deals->onFirstPage())
                        <span class="px-1 text-ink/30" aria-hidden="true">‹</span>
                    @else
                        <a href="{{ $deals->previousPageUrl() }}" aria-label="Previous">‹</a>
                    @endif
                    @foreach ($deals->getUrlRange(1, $deals->lastPage()) as $page => $url)
                        <a href="{{ $url }}" @class(['active' => $page === $deals->currentPage()])>{{ $page }}</a>
                    @endforeach
                    @if ($deals->hasMorePages())
                        <a href="{{ $deals->nextPageUrl() }}" aria-label="Next">›</a>
                    @else
                        <span class="px-1 text-ink/30" aria-hidden="true">›</span>
                    @endif
                </div>
            </div>
        @endif
    </section>

@endsection

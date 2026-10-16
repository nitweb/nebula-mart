@extends('admin.dashboard.dashboard')
@section('admin_title', 'Coupons · Nebula Mart Admin')
@section('admin_contents')

    @php
        $badges = ['active' => ['b-success', 'Active'], 'scheduled' => ['b-info', 'Scheduled'], 'expired' => ['b-muted', 'Expired'], 'exhausted' => ['b-muted', 'Fully used'], 'inactive' => ['b-muted', 'Inactive']];
    @endphp

    <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Coupons</h1>
            <p class="text-ink/55 mt-1">Create discount codes for your customers.</p>
        </div>
        <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
            <svg class="ic ic-sm"><use href="#i-plus" /></svg>Create coupon
        </a>
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
                        <th>Code</th>
                        <th>Type</th>
                        <th>Discount</th>
                        <th>Min. order</th>
                        <th>Used</th>
                        <th>Expires</th>
                        <th>Status</th>
                        <th>Active</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coupons as $coupon)
                        @php [$badgeClass, $badgeText] = $badges[$coupon->phase()]; @endphp
                        <tr>
                            <td><span class="font-mono font-bold bg-accent-soft text-accent-dark px-3 py-1.5 rounded-lg border border-dashed border-accent">{{ $coupon->code }}</span></td>
                            <td>{{ \App\Models\Coupon::TYPES[$coupon->type] ?? $coupon->type }}</td>
                            <td><b>{{ $coupon->type === 'free_delivery' ? '—' : $coupon->discount_label }}</b></td>
                            <td>{{ $coupon->min_order ? '৳'.number_format($coupon->min_order) : '—' }}</td>
                            <td>{{ $coupon->used_count }}{{ $coupon->usage_limit ? ' / '.$coupon->usage_limit : '' }}</td>
                            <td>{{ $coupon->expires_at?->format('d M Y') ?? 'Never' }}</td>
                            <td><span class="badge {{ $badgeClass }}">{{ $badgeText }}</span></td>
                            <td>
                                <form method="POST" action="{{ route('admin.coupons.toggle', $coupon) }}">
                                    @csrf
                                    @method('PATCH')
                                    <label class="switch"><input type="checkbox" @checked($coupon->is_active) onchange="this.form.submit()"><i></i></label>
                                </form>
                            </td>
                            <td>
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.coupons.edit', $coupon) }}" class="icon-btn" title="Edit">
                                        <svg class="ic"><use href="#i-edit" /></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.coupons.destroy', $coupon) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="icon-btn danger" data-delete="{{ $coupon->code }}" title="Delete">
                                            <svg class="ic"><use href="#i-trash" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="9" class="text-ink/55">No coupons yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($coupons->hasPages())
            <div class="flex flex-wrap items-center justify-between gap-3 px-5 py-4 border-t border-line">
                <p class="text-sm text-ink/55">Showing <b class="text-ink">{{ $coupons->firstItem() }}–{{ $coupons->lastItem() }}</b> of <b class="text-ink">{{ $coupons->total() }}</b> results</p>
                <div class="pg flex items-center gap-1">
                    @if ($coupons->onFirstPage())
                        <span class="px-1 text-ink/30" aria-hidden="true">‹</span>
                    @else
                        <a href="{{ $coupons->previousPageUrl() }}" aria-label="Previous">‹</a>
                    @endif
                    @foreach ($coupons->getUrlRange(1, $coupons->lastPage()) as $page => $url)
                        <a href="{{ $url }}" @class(['active' => $page === $coupons->currentPage()])>{{ $page }}</a>
                    @endforeach
                    @if ($coupons->hasMorePages())
                        <a href="{{ $coupons->nextPageUrl() }}" aria-label="Next">›</a>
                    @else
                        <span class="px-1 text-ink/30" aria-hidden="true">›</span>
                    @endif
                </div>
            </div>
        @endif
    </section>

@endsection

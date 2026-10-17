@extends('frontend.account.layout')

@section('frontend_title', 'Order '.$order->number.' | '.$setting('store_name'))
@section('account_title', 'Order '.$order->number)
@section('account_sub', 'Placed on '.$order->created_at->format('d M Y, h:i A'))

@section('account_body')
    @php
        $tk = fn (float $n) => '৳'.number_format($n, floor($n) == $n ? 0 : 2);
        $card = 'bg-white border border-line rounded-3xl p-6 lg:p-8';
    @endphp

    <div class="grid gap-6">
        <section class="{{ $card }}" aria-labelledby="h-status">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <h2 id="h-status" class="font-display font-extrabold text-2xl">Status</h2>
                <span class="acct-badge" data-status="{{ $order->status }}">{{ $order->status_label }}</span>
            </div>
            <ol class="mt-5 grid gap-4">
                @foreach ($order->events->reverse() as $event)
                    <li class="flex gap-3">
                        <span class="mt-1.5 w-3 h-3 rounded-full shrink-0 {{ $loop->first ? 'bg-primary' : 'bg-ink/25' }}"></span>
                        <span>
                            <b>{{ \App\Models\Order::STATUSES[$event->status] ?? ucfirst($event->status) }}</b>
                            <span class="block text-sm text-ink/60">{{ \Illuminate\Support\Carbon::parse($event->created_at)->format('d M Y, h:i A') }}@if ($event->note) · {{ $event->note }}@endif</span>
                        </span>
                    </li>
                @endforeach
            </ol>
            @if ($order->courier_label || $order->tracking_id)
                <p class="mt-5 rounded-xl bg-accent/25 border border-line px-4 py-3 text-sm">Courier: <b>{{ $order->courier_label ?: 'Not assigned yet' }}</b>@if ($order->tracking_id) · Tracking ID: <b>{{ $order->tracking_id }}</b>@endif</p>
            @endif
            <div class="flex flex-wrap gap-2 mt-5">
                <a href="{{ route('track.show') }}" class="px-4 py-2 rounded-xl border border-line font-bold text-sm hover:bg-primary-soft">Track this order</a>
                <form method="POST" action="{{ route('account.orders.reorder', $order->number) }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded-xl bg-primary text-white font-bold text-sm hover:bg-primary-dark">Order again</button>
                </form>
            </div>
        </section>

        <section class="{{ $card }}" aria-labelledby="h-items">
            <h2 id="h-items" class="font-display font-extrabold text-2xl">Items</h2>
            <ul class="grid gap-4 mt-5">
                @foreach ($order->items as $item)
                    <li class="flex items-center gap-4">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}" width="300" height="300" class="w-16 h-16 rounded-lg object-cover border border-line" loading="lazy">
                        <div class="flex-1 min-w-0">
                            @if ($item->product)
                                <a href="{{ $item->product->url }}" class="font-bold leading-snug hover:text-primary">{{ $item->name }}</a>
                            @else
                                <p class="font-bold leading-snug">{{ $item->name }}</p>
                            @endif
                            <p class="text-sm text-ink/60">{{ $item->variant_label ? $item->variant_label.' · ' : '' }}Qty {{ $item->quantity }} × {{ $tk($item->unit_price) }}</p>
                            @if ($order->status === 'delivered' && $item->product_id && ! in_array($item->product_id, $reviewed, true))
                                <a href="{{ route('account.reviews') }}" class="text-sm font-bold underline underline-offset-4">Write a review</a>
                            @endif
                        </div>
                        <p class="font-bold">{{ $tk($item->line_total) }}</p>
                    </li>
                @endforeach
            </ul>
            <dl class="mt-6 grid gap-2.5 border-t-2 border-dashed border-line pt-5 max-w-sm ml-auto">
                <div class="flex justify-between"><dt>Subtotal</dt><dd class="font-bold">{{ $tk($order->subtotal) }}</dd></div>
                @if ($order->discount > 0)
                    <div class="flex justify-between"><dt>Coupon {{ $order->coupon_code }}</dt><dd class="font-bold text-success">-{{ $tk($order->discount) }}</dd></div>
                @endif
                <div class="flex justify-between"><dt>Delivery <span class="text-xs text-ink/60">({{ $order->zone_label }})</span></dt><dd class="font-bold">{{ $order->delivery_fee > 0 ? $tk($order->delivery_fee) : 'Free' }}</dd></div>
                <div class="flex justify-between items-baseline border-t-2 border-line pt-4 mt-1"><dt class="font-display font-extrabold text-xl">Total</dt><dd class="font-display font-extrabold text-2xl text-primary">{{ $tk($order->total) }}</dd></div>
            </dl>
        </section>

        <div class="grid md:grid-cols-2 gap-4">
            <section class="{{ $card }} !p-6" aria-labelledby="h-ship">
                <h2 id="h-ship" class="font-display font-extrabold text-xl">Delivery address</h2>
                <p class="mt-3 font-bold">{{ $order->name }}</p>
                <p class="text-sm text-ink/70">{{ $order->full_address }}</p>
                <p class="text-sm text-ink/70">{{ $order->phone }}</p>
                @if ($order->note)
                    <p class="mt-3 text-sm"><b>Note:</b> {{ $order->note }}</p>
                @endif
            </section>
            <section class="{{ $card }} !p-6" aria-labelledby="h-pay">
                <h2 id="h-pay" class="font-display font-extrabold text-xl">Payment</h2>
                <p class="mt-3 font-bold">{{ $order->payment_label }}</p>
                <p class="text-sm text-ink/70">{{ ucfirst($order->payment_status) }}</p>
            </section>
        </div>
    </div>
@endsection

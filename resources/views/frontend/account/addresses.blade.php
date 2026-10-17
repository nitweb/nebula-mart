@extends('frontend.account.layout')

@section('frontend_title', 'Saved addresses | '.$setting('store_name'))
@section('account_title', 'Saved addresses')
@section('account_sub', 'Your delivery addresses. The default one is filled in at checkout.')

@section('account_body')
    @php
        $card = 'bg-white border border-line rounded-3xl p-6 lg:p-8';
        $field = 'w-full rounded-xl border border-line px-4 py-3 bg-white focus:outline-none focus:shadow-md';
        $districts = \App\Services\CheckoutService::districts();
        // Form values: what was just submitted for that form, otherwise what is saved.
        $val = fn (string $form, string $key, mixed $saved = '') => old('_form') === $form ? old($key) : $saved;
        $err = fn (string $form, string $key) => old('_form') === $form ? $errors->first($key) : '';
    @endphp

    <datalist id="district-options">
        @foreach ($districts as $district)
            <option value="{{ $district }}"></option>
        @endforeach
    </datalist>

    <div class="grid gap-4">
        @forelse ($addresses as $address)
            @php $form = 'edit-'.$address->id; @endphp
            <article class="{{ $card }} !p-6">
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <p class="font-bold">{{ $address->name }}
                            <span class="acct-badge" data-status="info">{{ $address->label }}</span>
                            @if ($address->is_default)<span class="acct-badge" data-status="delivered">Default</span>@endif
                        </p>
                        <p class="text-sm text-ink/70 mt-1">{{ $address->full_address }}</p>
                        <p class="text-sm text-ink/70">{{ $address->phone }}</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @unless ($address->is_default)
                            <form method="POST" action="{{ route('account.addresses.default', $address) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-3 py-1.5 rounded-lg border border-line font-bold text-sm hover:bg-primary-soft">Make default</button>
                            </form>
                        @endunless
                        <form method="POST" action="{{ route('account.addresses.destroy', $address) }}" onsubmit="return confirm('Remove this address?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 rounded-lg border border-line font-bold text-sm text-danger hover:bg-primary-soft">Remove</button>
                        </form>
                    </div>
                </div>

                <details class="mt-4" @if (old('_form') === $form) open @endif>
                    <summary class="cursor-pointer font-bold text-sm underline underline-offset-4">Edit this address</summary>
                    <form method="POST" action="{{ route('account.addresses.update', $address) }}" class="grid sm:grid-cols-2 gap-4 mt-4" novalidate>
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="_form" value="{{ $form }}">
                        @include('frontend.account.partials.address_fields', ['form' => $form, 'saved' => $address])
                        <div class="sm:col-span-2">
                            <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-extrabold rounded-xl px-6 py-2.5 transition-colors">Save address</button>
                        </div>
                    </form>
                </details>
            </article>
        @empty
            <div class="{{ $card }} text-center">
                <p class="font-display text-2xl">No saved address</p>
                <p class="mt-2 text-ink/70">Add one below, or we will save your address after your first order.</p>
            </div>
        @endforelse

        @if ($addresses->count() < $limit)
            <section class="{{ $card }}" aria-labelledby="h-add">
                <h2 id="h-add" class="font-display font-extrabold text-2xl">Add a new address</h2>
                <form method="POST" action="{{ route('account.addresses.store') }}" class="grid sm:grid-cols-2 gap-4 mt-5" novalidate>
                    @csrf
                    <input type="hidden" name="_form" value="new">
                    @include('frontend.account.partials.address_fields', ['form' => 'new', 'saved' => null])
                    <div class="sm:col-span-2">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-extrabold rounded-xl px-6 py-3 transition-colors">Save address</button>
                    </div>
                </form>
            </section>
        @endif
    </div>
@endsection

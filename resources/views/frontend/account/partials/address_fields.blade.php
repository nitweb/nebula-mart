@php
    $field = 'w-full rounded-xl border border-line px-4 py-3 bg-white focus:outline-none focus:shadow-md';
    $val = fn (string $key, mixed $default = '') => old('_form') === $form ? old($key) : ($saved?->{$key} ?? $default);
    $err = fn (string $key) => old('_form') === $form ? $errors->first($key) : '';
    $id = $form.'-';
@endphp

<div class="sm:col-span-2">
    <label for="{{ $id }}label" class="block font-bold text-sm mb-1.5">Address name <span class="text-primary">*</span></label>
    <input id="{{ $id }}label" name="label" type="text" required maxlength="30" placeholder="Home, Office…" value="{{ $val('label', 'Home') }}" class="{{ $field }}">
    @if ($err('label'))<p class="text-sm font-bold text-danger mt-1.5">{{ $err('label') }}</p>@endif
</div>
<div>
    <label for="{{ $id }}name" class="block font-bold text-sm mb-1.5">Full name <span class="text-primary">*</span></label>
    <input id="{{ $id }}name" name="name" type="text" required maxlength="100" autocomplete="name" value="{{ $val('name', auth()->user()->name) }}" class="{{ $field }}">
    @if ($err('name'))<p class="text-sm font-bold text-danger mt-1.5">{{ $err('name') }}</p>@endif
</div>
<div>
    <label for="{{ $id }}phone" class="block font-bold text-sm mb-1.5">Mobile number <span class="text-primary">*</span></label>
    <input id="{{ $id }}phone" name="phone" type="tel" required inputmode="numeric" maxlength="11" pattern="01[3-9][0-9]{8}" placeholder="01XXXXXXXXX" value="{{ $val('phone', auth()->user()->phone) }}" class="{{ $field }}">
    @if ($err('phone'))<p class="text-sm font-bold text-danger mt-1.5">{{ $err('phone') }}</p>@endif
</div>
<div class="sm:col-span-2 grid sm:grid-cols-2 gap-4" data-ap>
    <div class="relative">
        <label for="{{ $id }}district" class="block font-bold text-sm mb-1.5">District <span class="text-primary">*</span></label>
        <input id="{{ $id }}district" name="district" type="text" required autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" data-ap-district placeholder="Search or select district" value="{{ $val('district') }}" class="{{ $field }}">
        <ul class="ap-list" role="listbox" data-ap-district-list hidden></ul>
        @if ($err('district'))<p class="text-sm font-bold text-danger mt-1.5">{{ $err('district') }}</p>@endif
    </div>
    <div class="relative">
        <label for="{{ $id }}area" class="block font-bold text-sm mb-1.5">Area / Thana <span class="text-primary">*</span></label>
        <input id="{{ $id }}area" name="area" type="text" required autocomplete="off" maxlength="120" aria-autocomplete="list" data-ap-area @disabled(! $val('district')) placeholder="{{ $val('district') ? 'Select or type thana / upazila' : 'Select district first' }}" value="{{ $val('area') }}" class="{{ $field }}">
        <ul class="ap-list" role="listbox" data-ap-area-list hidden></ul>
        @if ($err('area'))<p class="text-sm font-bold text-danger mt-1.5">{{ $err('area') }}</p>@endif
    </div>
</div>
<div class="sm:col-span-2">
    <label for="{{ $id }}address" class="block font-bold text-sm mb-1.5">Full address <span class="text-primary">*</span></label>
    <textarea id="{{ $id }}address" name="address" rows="2" required maxlength="500" placeholder="House, road, block, landmark" class="{{ $field }}">{{ $val('address') }}</textarea>
    @if ($err('address'))<p class="text-sm font-bold text-danger mt-1.5">{{ $err('address') }}</p>@endif
</div>
<div class="sm:col-span-2">
    <label class="flex items-center gap-3 cursor-pointer">
        <input type="checkbox" name="is_default" value="1" class="w-5 h-5 accent-primary" @checked(old('_form') === $form ? old('is_default') : ($saved?->is_default ?? false))>
        <span class="text-sm font-bold">Use as my default address</span>
    </label>
</div>

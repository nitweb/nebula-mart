@extends('frontend.account.layout')

@section('frontend_title', 'Profile | '.$setting('store_name'))
@section('account_title', 'Profile & password')
@section('account_sub', 'Keep your details up to date. Your mobile number is what you sign in with.')

@section('account_body')
    @php
        $card = 'bg-white border border-line rounded-3xl p-6 lg:p-8';
        $field = 'w-full rounded-xl border border-line px-4 py-3 bg-white focus:outline-none focus:shadow-md';
        $pwErrors = $errors->getBag('password');
    @endphp

    <div class="grid gap-6">
        <section class="{{ $card }}" aria-labelledby="h-info">
            <h2 id="h-info" class="font-display font-extrabold text-2xl">Your details</h2>
            <form method="POST" action="{{ route('account.profile.update') }}" class="grid sm:grid-cols-2 gap-4 mt-5" novalidate>
                @csrf
                @method('PATCH')
                <div class="sm:col-span-2">
                    <label for="name" class="block font-bold text-sm mb-1.5">Full name <span class="text-primary">*</span></label>
                    <input id="name" name="name" type="text" required maxlength="100" autocomplete="name" value="{{ old('name', $user->name) }}" class="{{ $field }}">
                    @error('name')<p class="text-sm font-bold text-danger mt-1.5">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="phone" class="block font-bold text-sm mb-1.5">Mobile number <span class="text-primary">*</span></label>
                    <input id="phone" name="phone" type="tel" required inputmode="numeric" maxlength="11" pattern="01[3-9][0-9]{8}" autocomplete="tel" value="{{ old('phone', $user->phone) }}" class="{{ $field }}">
                    @error('phone')<p class="text-sm font-bold text-danger mt-1.5">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="email" class="block font-bold text-sm mb-1.5">Email address <span class="text-primary">*</span></label>
                    <input id="email" name="email" type="email" required maxlength="150" autocomplete="email" value="{{ old('email', $user->email) }}" class="{{ $field }}">
                    @error('email')<p class="text-sm font-bold text-danger mt-1.5">{{ $message }}</p>@enderror
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-extrabold rounded-xl px-6 py-3 transition-colors">Save changes</button>
                </div>
            </form>
        </section>

        <section class="{{ $card }}" aria-labelledby="h-pw">
            <h2 id="h-pw" class="font-display font-extrabold text-2xl">Change password</h2>
            <form method="POST" action="{{ route('account.password.update') }}" class="grid sm:grid-cols-2 gap-4 mt-5" novalidate>
                @csrf
                @method('PUT')
                <div class="sm:col-span-2">
                    <label for="current_password" class="block font-bold text-sm mb-1.5">Current password <span class="text-primary">*</span></label>
                    <input id="current_password" name="current_password" type="password" required autocomplete="current-password" class="{{ $field }}">
                    @if ($pwErrors->has('current_password'))<p class="text-sm font-bold text-danger mt-1.5">{{ $pwErrors->first('current_password') }}</p>@endif
                </div>
                <div>
                    <label for="new_password" class="block font-bold text-sm mb-1.5">New password <span class="text-primary">*</span></label>
                    <input id="new_password" name="password" type="password" required minlength="8" autocomplete="new-password" class="{{ $field }}">
                    @if ($pwErrors->has('password'))<p class="text-sm font-bold text-danger mt-1.5">{{ $pwErrors->first('password') }}</p>@endif
                </div>
                <div>
                    <label for="password_confirmation" class="block font-bold text-sm mb-1.5">Confirm new password <span class="text-primary">*</span></label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required minlength="8" autocomplete="new-password" class="{{ $field }}">
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="bg-ink hover:bg-primary text-white font-extrabold rounded-xl px-6 py-3 transition-colors">Update password</button>
                </div>
            </form>
        </section>
    </div>
@endsection

@extends('frontend.dashboard.dashboard')

@section('frontend_title', 'Create account | '.$setting('store_name'))
@section('frontend_description', 'Create a free account for faster checkout, saved addresses and easy order tracking.')
@section('page', 'register')

@section('frontend_contents')
    <main id="main" class="pg auth">
        <aside class="auth__side">
            <div class="auth__side-in">
                <nav aria-label="Breadcrumb" class="crumbs">
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li aria-hidden="true">/</li>
                        <li aria-current="page">Create account</li>
                    </ol>
                </nav>
                <h1>Join shoppers across Bangladesh.</h1>
                <p class="auth__lead">One free account for faster checkout, saved addresses and easy order tracking.</p>
                <ul class="auth__perks">
                    <li><span class="ic ic-zap" aria-hidden="true"></span><span><b>Checkout in seconds</b>Save your details once, order again in a tap.</span></li>
                    <li><span class="ic ic-truck" aria-hidden="true"></span><span><b>Delivery to all 64 districts</b>Cash on delivery available.</span></li>
                    <li><span class="ic ic-return" aria-hidden="true"></span><span><b>Easy 7-day returns</b>Changed your mind? We arrange the pickup.</span></li>
                </ul>
            </div>
        </aside>
        <section class="auth__panel">
            <div class="auth__card">
                <nav class="seg" aria-label="Account"><a href="{{ route('login') }}">Sign in</a><a href="{{ route('register') }}" aria-current="page">Create account</a></nav>
                <h2>Create account</h2>
                <p class="auth__sub">It takes less than a minute.</p>

                <form id="auth-form" class="auth__form" method="POST" action="{{ route('register') }}" novalidate data-kind="register">
                    @csrf
                    <div class="fld"><label class="lbl" for="r-name">Full name <i>*</i></label>
                        <div class="fld__box"><span class="ic ic-user" aria-hidden="true"></span><input id="r-name" name="name" type="text" required maxlength="100" placeholder="Your full name" autocomplete="name" value="{{ old('name') }}"></div>
                        @error('name')<p class="text-sm font-bold mt-1" style="color:#c0392b">{{ $message }}</p>@enderror
                    </div>
                    <div class="fld"><label class="lbl" for="r-phone">Mobile number <i>*</i></label>
                        <div class="fld__box fld__box--pre"><span class="ic ic-phone" aria-hidden="true"></span><span class="pre">+880</span><input id="r-phone" name="phone" type="tel" required placeholder="01XXXXXXXXX" autocomplete="tel-national" inputmode="numeric" pattern="(\+?88)?01[3-9][0-9]{8}" title="Enter a valid Bangladeshi mobile number, e.g. 01712345678" value="{{ old('phone') }}"></div>
                        @error('phone')
                            <p class="text-sm font-bold mt-1" style="color:#c0392b">{{ $message }}@if (str_contains($message, 'already has an account')) <a href="{{ route('login') }}" style="text-decoration:underline">Sign in</a>@endif</p>
                        @enderror
                    </div>
                    <div class="fld"><label class="lbl" for="r-email">Email address <i>*</i></label>
                        <div class="fld__box"><span class="ic ic-mail" aria-hidden="true"></span><input id="r-email" name="email" type="email" required maxlength="150" placeholder="you@example.com" autocomplete="email" value="{{ old('email') }}"></div>
                        @error('email')<p class="text-sm font-bold mt-1" style="color:#c0392b">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <div class="fld"><label class="lbl" for="r-pw">Password <i>*</i></label>
                            <div class="fld__box fld__box--pw"><span class="ic ic-lock" aria-hidden="true"></span><input id="r-pw" name="password" type="password" required minlength="8" placeholder="At least 8 characters" autocomplete="new-password" data-strength><button type="button" class="eye" data-eye aria-label="Show password" aria-pressed="false"><span class="ic ic-eye" aria-hidden="true"></span></button></div>
                            @error('password')<p class="text-sm font-bold mt-1" style="color:#c0392b">{{ $message }}</p>@enderror
                        </div>
                        <div class="meter" id="pw-meter" data-level="0" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
                        <p class="pw-label" id="pw-label" aria-live="polite">Use at least 8 characters</p>
                    </div>
                    <div>
                        <label class="chk"><input type="checkbox" name="terms" value="1" required @checked(old('terms'))><span>I agree to the <a href="{{ url('/terms') }}">Terms</a> and <a href="{{ url('/privacy') }}">Privacy Policy</a>.</span></label>
                        @error('terms')<p class="text-sm font-bold mt-1" style="color:#c0392b">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="btn btn--primary btn--block auth__submit">Create account <span class="ic ic-arrow" aria-hidden="true"></span></button>
                </form>
                <p class="auth__foot">Already registered? <a href="{{ route('login') }}">Sign in</a></p>
            </div>
        </section>
    </main>
@endsection

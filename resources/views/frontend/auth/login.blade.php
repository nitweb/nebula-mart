@extends('frontend.dashboard.dashboard')

@section('frontend_title', 'Sign in | '.$setting('store_name'))
@section('frontend_description', 'Sign in with your mobile number to follow your orders, reuse saved addresses and keep your wishlist.')
@section('page', 'login')

@section('frontend_contents')
    <main id="main" class="pg auth">
        <aside class="auth__side">
            <div class="auth__side-in">
                <nav aria-label="Breadcrumb" class="crumbs">
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li aria-hidden="true">/</li>
                        <li aria-current="page">Sign in</li>
                    </ol>
                </nav>
                <h1>Pick up right where you left off.</h1>
                <p class="auth__lead">Sign in to follow your orders, reuse saved addresses and keep your wishlist close.</p>
                <ul class="auth__perks">
                    <li><span class="ic ic-package" aria-hidden="true"></span><span><b>Live order tracking</b>See every package from checkout to your door.</span></li>
                    <li><span class="ic ic-heart" aria-hidden="true"></span><span><b>Your wishlist, saved</b>Come back to the things you love, any time.</span></li>
                </ul>
            </div>
        </aside>
        <section class="auth__panel">
            <div class="auth__card">
                <nav class="seg" aria-label="Account"><a href="{{ route('login') }}" aria-current="page">Sign in</a><a href="{{ route('register') }}">Create account</a></nav>
                <h2>Sign in</h2>
                <p class="auth__sub">Welcome back. Enter your mobile number and password to continue.</p>

                @if (session('status'))
                    <p class="note is-ok" role="status">{{ session('status') }}</p>
                @endif

                <form id="auth-form" class="auth__form" method="POST" action="{{ route('login') }}" novalidate data-kind="login">
                    @csrf
                    <div class="fld"><label class="lbl" for="l-phone">Mobile number <i>*</i></label>
                        <div class="fld__box fld__box--pre"><span class="ic ic-phone" aria-hidden="true"></span><span class="pre">+880</span><input id="l-phone" name="phone" type="tel" required placeholder="01XXXXXXXXX" autocomplete="username" inputmode="numeric" pattern="01[3-9][0-9]{8}" maxlength="18" title="Enter a valid Bangladeshi mobile number, e.g. 01712345678" value="{{ old('phone') }}" autofocus></div>
                        @error('phone')<p class="text-sm font-bold mt-1" style="color:#c0392b">{{ $message }}</p>@enderror
                    </div>
                    <div class="fld"><label class="lbl" for="l-pw">Password <i>*</i></label>
                        <div class="fld__box fld__box--pw"><span class="ic ic-lock" aria-hidden="true"></span><input id="l-pw" name="password" type="password" required placeholder="Your password" autocomplete="current-password"><button type="button" class="eye" data-eye aria-label="Show password" aria-pressed="false"><span class="ic ic-eye" aria-hidden="true"></span></button></div>
                        @error('password')<p class="text-sm font-bold mt-1" style="color:#c0392b">{{ $message }}</p>@enderror
                    </div>
                    <div class="auth__row">
                        <label class="chk"><input type="checkbox" name="remember" value="1" @checked(old('remember'))><span>Keep me signed in</span></label>
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn--primary btn--block auth__submit">Sign in <span class="ic ic-arrow" aria-hidden="true"></span></button>
                </form>
                <p class="auth__foot">New to {{ $setting('store_name') }}? <a href="{{ route('register') }}">Create an account</a></p>
            </div>
        </section>
    </main>
@endsection

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="noindex,nofollow">

    <title>@yield('admin_title')</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/admin/img/favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/admin/img/favicon-32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/admin/img/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/inline.css') }}">

</head>

<body class="min-h-screen">

    <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-40 lg:hidden"></div>

    <div class="flex">

        {{-- Sidebar --}}
        @include('admin.dashboard.layouts.sidebar')

        <div class="flex-1 min-w-0 flex flex-col min-h-screen">

            {{-- Header --}}
            @include('admin.dashboard.layouts.header')

            <main class="flex-1 p-4 sm:p-8 space-y-6 max-w-[1500px] w-full mx-auto">
                @yield('admin_contents')
            </main>

            {{-- Footer --}}
            @include('admin.dashboard.layouts.footer')

        </div>

    </div>

    <div id="confirm-modal" class="modal">
        <div class="p-7 text-center">
            <span class="w-16 h-16 rounded-2xl bg-danger/10 text-danger grid place-items-center mx-auto mb-4">
                <svg class="ic ic-lg">
                    <use href="#i-trash" />
                </svg>
            </span>
            <h3 class="font-display font-extrabold text-xl">Delete item?</h3>
            <p class="text-ink/60 mt-2">You are about to delete <b data-name></b>. This action cannot be undone.</p>
            <div class="flex gap-3 mt-6">
                <button class="btn btn-ghost flex-1" data-close>Cancel</button>
                <button class="btn btn-danger flex-1" data-confirm>Yes, delete</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>

</body>

</html>

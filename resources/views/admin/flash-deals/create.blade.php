@extends('admin.dashboard.dashboard')
@section('admin_title', 'New flash deal · Nebula Mart Admin')
@section('admin_contents')

    <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">New flash deal</h1>

    <form method="POST" action="{{ route('admin.flash-deals.store') }}">
        @csrf
        @include('admin.flash-deals._form', ['deal' => null])
    </form>

@endsection

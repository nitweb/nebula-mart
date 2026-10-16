@extends('admin.dashboard.dashboard')
@section('admin_title', 'Create coupon · Nebula Mart Admin')
@section('admin_contents')

    <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Create coupon</h1>

    <form method="POST" action="{{ route('admin.coupons.store') }}" class="max-w-4xl">
        @csrf
        @include('admin.coupons._form', ['coupon' => null])
    </form>

@endsection

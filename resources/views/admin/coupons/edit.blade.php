@extends('admin.dashboard.dashboard')
@section('admin_title', 'Edit coupon · Nebula Mart Admin')
@section('admin_contents')

    <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Edit coupon</h1>

    <form method="POST" action="{{ route('admin.coupons.update', $coupon) }}" class="max-w-4xl">
        @csrf
        @method('PUT')
        @include('admin.coupons._form', ['coupon' => $coupon])
    </form>

@endsection

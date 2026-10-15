@extends('admin.dashboard.dashboard')
@section('admin_title', 'Edit brand · Nebula Mart Admin')
@section('admin_contents')

    <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Edit brand</h1>

    <form method="POST" action="{{ route('admin.brands.update', $brand) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.brands._form', ['brand' => $brand])
    </form>

@endsection

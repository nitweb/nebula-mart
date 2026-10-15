@extends('admin.dashboard.dashboard')
@section('admin_title', 'Add brand · Nebula Mart Admin')
@section('admin_contents')

    <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Add brand</h1>

    <form method="POST" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.brands._form', ['brand' => null])
    </form>

@endsection

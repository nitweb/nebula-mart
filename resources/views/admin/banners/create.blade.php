@extends('admin.dashboard.dashboard')
@section('admin_title', 'Add banner · Nebula Mart Admin')
@section('admin_contents')

    <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Add banner</h1>

    <form method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.banners._form', ['banner' => null])
    </form>

@endsection
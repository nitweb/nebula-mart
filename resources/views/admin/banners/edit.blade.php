@extends('admin.dashboard.dashboard')
@section('admin_title', 'Edit banner · Nebula Mart Admin')
@section('admin_contents')

    <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Edit banner</h1>

    <form method="POST" action="{{ route('admin.banners.update', $banner) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.banners._form', ['banner' => $banner])
    </form>

@endsection
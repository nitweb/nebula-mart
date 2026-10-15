@extends('admin.dashboard.dashboard')
@section('admin_title', 'Edit category · Nebula Mart Admin')
@section('admin_contents')

    <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Edit category</h1>

    <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.categories._form', ['category' => $category])
    </form>

@endsection

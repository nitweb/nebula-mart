@extends('admin.dashboard.dashboard')
@section('admin_title', 'Add category · Nebula Mart Admin')
@section('admin_contents')

    <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Add category</h1>

    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.categories._form', ['category' => null])
    </form>

@endsection

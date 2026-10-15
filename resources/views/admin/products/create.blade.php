@extends('admin.dashboard.dashboard')
@section('admin_title', 'Add new product · Nebula Mart Admin')
@section('admin_contents')

    <div class="flex flex-wrap items-end justify-between gap-4">
        <h1 class="font-display font-extrabold text-2xl sm:text-[28px] tracking-tight">Add new product</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-ghost">
            <svg class="ic ic-sm"><use href="#i-chev-left" /></svg>Back to products
        </a>
    </div>

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.products._form', ['product' => null])
    </form>

@endsection

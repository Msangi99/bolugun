@extends('layouts.admin-app')

@section('title', __('Add product'))

@section('page_heading', __('Add product'))

@section('main')
    <div class="mx-auto max-w-2xl">
        @if ($categories->isEmpty())
            <p class="rounded-lg border border-amber-800/60 bg-amber-950/30 px-4 py-3 text-sm text-amber-200">{{ __('Create at least one product category before adding products.') }}</p>
            <a href="{{ route('admin.product-categories.create') }}" class="mt-4 inline-flex rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-zinc-950 hover:bg-amber-400">{{ __('Add category') }}</a>
            <a href="{{ route('admin.products.index') }}" class="mt-4 ms-3 inline-block text-sm text-zinc-400 hover:text-white">{{ __('Back') }}</a>
        @else
            <form method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @include('admin.site-products._fields', ['product' => null, 'categories' => $categories])
                <div class="flex gap-3">
                    <button type="submit" class="rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-zinc-950 hover:bg-amber-400">{{ __('Save') }}</button>
                    <a href="{{ route('admin.products.index') }}" class="rounded-lg border border-zinc-700 px-5 py-2.5 text-sm text-zinc-400">{{ __('Cancel') }}</a>
                </div>
            </form>
        @endif
    </div>
@endsection

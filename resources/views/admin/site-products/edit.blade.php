@extends('layouts.admin-app')

@section('title', __('Edit').' — '.$product->title)

@section('page_heading', $product->title)

@section('main')
    <div class="mx-auto max-w-2xl">
        @if (session('status'))
            <p class="mb-4 rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200">{{ session('status') }}</p>
        @endif
        <form method="post" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            @include('admin.site-products._fields', ['product' => $product, 'categories' => $categories])
            <div class="flex flex-wrap gap-3">
                <button type="submit" class="rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-zinc-950 hover:bg-amber-400">{{ __('Save') }}</button>
                <a href="{{ route('pages.show', 'products') }}" target="_blank" class="rounded-lg border border-zinc-600 px-5 py-2.5 text-sm text-zinc-200">{{ __('View on site') }}</a>
                <a href="{{ route('admin.products.index') }}" class="rounded-lg border border-zinc-700 px-5 py-2.5 text-sm text-zinc-400">{{ __('Back') }}</a>
            </div>
        </form>
    </div>
@endsection

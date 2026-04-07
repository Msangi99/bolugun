@extends('layouts.admin-app')

@section('title', 'Dashboard')

@section('page_heading', 'Dashboard')

@section('main')
    <div class="mx-auto max-w-6xl">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3 lg:gap-8">
            <article class="rounded-2xl border border-zinc-800 bg-zinc-900/70 p-5 sm:p-6">
                <h2 class="text-sm font-medium text-zinc-400">{{ __('Account') }}</h2>
                <p class="mt-2 text-lg font-semibold text-white md:text-xl">{{ $admin->name }}</p>
                <p class="mt-1 text-sm text-zinc-500">{{ $admin->email }}</p>
            </article>
            <article class="rounded-2xl border border-zinc-800 bg-zinc-900/70 p-5 sm:p-6">
                <h2 class="text-sm font-medium text-zinc-400">{{ __('Role') }}</h2>
                <p class="mt-2 text-lg font-semibold capitalize text-white md:text-xl">
                    {{ $admin->role?->name ?? '—' }}
                </p>
                <p class="mt-1 text-sm text-zinc-500">{{ __('Administrator access') }}</p>
            </article>
            <article class="rounded-2xl border border-zinc-800 bg-zinc-900/70 p-5 sm:p-6 sm:col-span-2 lg:col-span-1">
                <h2 class="text-sm font-medium text-zinc-400">{{ __('Quick links') }}</h2>
                <ul class="mt-3 space-y-2 text-sm text-zinc-300">
                    <li><a href="{{ route('admin.product-categories.index') }}" class="text-amber-400 hover:underline">{{ __('Product categories') }}</a> — {{ __('create names, images, and filters for the catalog') }}</li>
                    <li><a href="{{ route('admin.products.index') }}" class="text-amber-400 hover:underline">{{ __('Products') }}</a> — {{ __('assign each item to a category') }}</li>
                    <li><a href="{{ route('admin.team-members.index') }}" class="text-amber-400 hover:underline">{{ __('Team') }}</a> — {{ __('home page team photos and roles') }}</li>
                </ul>
            </article>
        </div>
    </div>
@endsection

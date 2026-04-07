@extends('layouts.admin-app')

@section('title', __('Products'))

@section('page_heading', __('Products catalog'))

@section('main')
    <div class="mx-auto max-w-6xl space-y-4">
        @if (session('status'))
            <p class="rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200">{{ session('status') }}</p>
        @endif
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-zinc-400">{{ __('Categories define the cards and filters on the public Products page. Create categories first, then assign each product.') }}</p>
            <div class="flex flex-wrap items-center gap-2 sm:justify-end">
                <a href="{{ route('admin.product-categories.index') }}" class="inline-flex rounded-lg border border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-200 hover:border-amber-500/50 hover:text-amber-400">{{ __('Product categories') }}</a>
                <a href="{{ route('admin.product-categories.create') }}" class="inline-flex rounded-lg border border-zinc-600 px-4 py-2 text-sm font-medium text-zinc-200 hover:border-amber-500/50 hover:text-amber-400">{{ __('Add category') }}</a>
                <a href="{{ route('admin.products.create') }}" class="inline-flex rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-zinc-950 hover:bg-amber-400">{{ __('Add product') }}</a>
            </div>
        </div>
        <div class="overflow-x-auto rounded-xl border border-zinc-800">
            <table class="w-full min-w-[720px] text-left text-sm text-zinc-300">
                <thead class="border-b border-zinc-800 bg-zinc-900/80 text-xs uppercase text-zinc-500">
                    <tr>
                        <th class="px-4 py-3">{{ __('Image') }}</th>
                        <th class="px-4 py-3">{{ __('Title') }}</th>
                        <th class="px-4 py-3">{{ __('Tag') }}</th>
                        <th class="px-4 py-3">{{ __('Category') }}</th>
                        <th class="px-4 py-3">{{ __('Order') }}</th>
                        <th class="px-4 py-3 text-end">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @forelse ($products as $p)
                        <tr>
                            <td class="px-4 py-3">
                                @if ($p->imageUrl())
                                    <img src="{{ $p->imageUrl() }}" alt="" class="size-14 rounded-lg object-cover">
                                @else
                                    <span class="text-zinc-600">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-medium text-white">{{ $p->title }}</td>
                            <td class="px-4 py-3">{{ $p->tag }}</td>
                            <td class="px-4 py-3 text-zinc-500">{{ $p->category?->name ?? '—' }}</td>
                            <td class="px-4 py-3 text-zinc-500">{{ $p->sort_order }}</td>
                            <td class="px-4 py-3 text-end">
                                <a href="{{ route('admin.products.edit', $p) }}" class="me-2 text-amber-400 hover:underline">{{ __('Edit') }}</a>
                                <form method="post" action="{{ route('admin.products.destroy', $p) }}" class="inline" onsubmit="return confirm(@json(__('Delete?')))">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-4 py-8 text-center text-zinc-500">{{ __('No products.') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('layouts.admin-app')

@section('title', __('Contact items'))

@section('page_heading', __('Contact info cards'))

@section('main')
    <div class="mx-auto max-w-5xl space-y-4">
        @if (session('status'))
            <p class="rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200">{{ session('status') }}</p>
        @endif
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-zinc-400">{{ __('Left column on the Contact page. Use an image or a Bootstrap Icons suffix (e.g. geo-alt → bi-geo-alt).') }}</p>
            <a href="{{ route('admin.contact-items.create') }}" class="inline-flex rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-zinc-950 hover:bg-amber-400">{{ __('Add item') }}</a>
        </div>
        <div class="overflow-x-auto rounded-xl border border-zinc-800">
            <table class="w-full min-w-[560px] text-left text-sm text-zinc-300">
                <thead class="border-b border-zinc-800 bg-zinc-900/80 text-xs uppercase text-zinc-500">
                    <tr>
                        <th class="px-4 py-3">{{ __('Preview') }}</th>
                        <th class="px-4 py-3">{{ __('Title') }}</th>
                        <th class="px-4 py-3">{{ __('Order') }}</th>
                        <th class="px-4 py-3 text-end">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @forelse ($items as $item)
                        <tr>
                            <td class="px-4 py-3">
                                @if ($item->imageUrl())
                                    <img src="{{ $item->imageUrl() }}" alt="" class="size-10 rounded object-cover">
                                @else
                                    <i class="bi bi-{{ $item->icon_class }} text-xl text-zinc-400"></i>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-medium text-white">{{ $item->title }}</td>
                            <td class="px-4 py-3 text-zinc-500">{{ $item->sort_order }}</td>
                            <td class="px-4 py-3 text-end">
                                <a href="{{ route('admin.contact-items.edit', $item) }}" class="me-2 text-amber-400 hover:underline">{{ __('Edit') }}</a>
                                <form method="post" action="{{ route('admin.contact-items.destroy', $item) }}" class="inline" onsubmit="return confirm(@json(__('Delete?')))">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-4 py-8 text-center text-zinc-500">{{ __('No items.') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('layouts.admin-app')

@section('title', __('About items'))

@section('page_heading', __('About page blocks'))

@section('main')
    <div class="mx-auto max-w-5xl space-y-4">
        @if (session('status'))
            <p class="rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200">{{ session('status') }}</p>
        @endif
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-zinc-400">{{ __('Cards on the public About page (image optional). If none exist, the full default About layout is shown.') }}</p>
            <a href="{{ route('admin.about-items.create') }}" class="inline-flex shrink-0 rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-zinc-950 hover:bg-amber-400">{{ __('Add item') }}</a>
        </div>
        <div class="overflow-x-auto rounded-xl border border-zinc-800">
            <table class="w-full min-w-[560px] text-left text-sm text-zinc-300">
                <thead class="border-b border-zinc-800 bg-zinc-900/80 text-xs uppercase text-zinc-500">
                    <tr>
                        <th class="px-4 py-3">{{ __('Image') }}</th>
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
                                    <img src="{{ $item->imageUrl() }}" alt="" class="size-12 rounded-lg object-cover">
                                @else
                                    <span class="inline-flex size-12 items-center justify-center rounded-lg border border-dashed border-zinc-600 text-zinc-600">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-medium text-white">{{ $item->title }}</td>
                            <td class="px-4 py-3 text-zinc-500">{{ $item->sort_order }}</td>
                            <td class="px-4 py-3 text-end">
                                <a href="{{ route('admin.about-items.edit', $item) }}" class="me-2 text-amber-400 hover:underline">{{ __('Edit') }}</a>
                                <form method="post" action="{{ route('admin.about-items.destroy', $item) }}" class="inline" onsubmit="return confirm(@json(__('Delete?')))">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-4 py-8 text-center text-zinc-500">{{ __('No items.') }} <a href="{{ route('admin.about-items.create') }}" class="text-amber-400">{{ __('Add one') }}</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

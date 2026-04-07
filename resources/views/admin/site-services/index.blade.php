@extends('layouts.admin-app')

@section('title', __('Services'))

@section('page_heading', __('Our services'))

@section('main')
    <div class="mx-auto max-w-5xl space-y-4">
        @if (session('status'))
            <p class="rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200" role="status">
                {{ session('status') }}
            </p>
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-zinc-400">
                {{ __('These entries appear on the public Services page as cards with an image, title, and description.') }}
            </p>
            <a
                href="{{ route('admin.services.create') }}"
                class="inline-flex shrink-0 items-center justify-center rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-zinc-950 hover:bg-amber-400"
            >
                {{ __('Add service') }}
            </a>
        </div>

        <div class="overflow-x-auto rounded-xl border border-zinc-800">
            <table class="w-full min-w-[640px] text-left text-sm text-zinc-300">
                <thead class="border-b border-zinc-800 bg-zinc-900/80 text-xs uppercase tracking-wide text-zinc-500">
                    <tr>
                        <th class="px-4 py-3">{{ __('Image') }}</th>
                        <th class="px-4 py-3">{{ __('Title') }}</th>
                        <th class="px-4 py-3">{{ __('Order') }}</th>
                        <th class="px-4 py-3 text-end">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @forelse ($services as $service)
                        <tr class="hover:bg-zinc-900/40">
                            <td class="px-4 py-3">
                                @if ($service->imageUrl())
                                    <img
                                        src="{{ $service->imageUrl() }}"
                                        alt=""
                                        class="size-12 rounded-lg object-cover"
                                    >
                                @else
                                    <span class="inline-flex size-12 items-center justify-center rounded-lg border border-dashed border-zinc-600 text-zinc-600">
                                        —
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-medium text-white">{{ $service->title }}</td>
                            <td class="px-4 py-3 text-zinc-500">{{ $service->sort_order }}</td>
                            <td class="px-4 py-3 text-end">
                                <div class="flex flex-wrap justify-end gap-2">
                                    <a
                                        href="{{ route('admin.services.edit', $service) }}"
                                        class="rounded-lg border border-zinc-600 px-3 py-1.5 text-xs font-medium text-zinc-200 hover:border-amber-500/50 hover:text-amber-400"
                                    >
                                        {{ __('Edit') }}
                                    </a>
                                    <form
                                        method="post"
                                        action="{{ route('admin.services.destroy', $service) }}"
                                        class="inline"
                                        onsubmit="return confirm(@json(__('Delete this service?')))"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-900/60 px-3 py-1.5 text-xs font-medium text-red-400 hover:bg-red-950/40"
                                        >
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-zinc-500">
                                {{ __('No services yet.') }}
                                <a href="{{ route('admin.services.create') }}" class="text-amber-500 hover:underline">{{ __('Add one') }}</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

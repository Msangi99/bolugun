@extends('layouts.admin-app')

@section('title', __('Site pages'))

@section('page_heading', __('Site pages'))

@section('main')
    <div class="mx-auto max-w-3xl space-y-4">
        <p class="text-sm text-zinc-400">
            {{ __('Edit the main marketing pages linked from the site header. Leave the content area empty to keep the default layout from the theme.') }}
        </p>
        <ul class="divide-y divide-zinc-800 rounded-xl border border-zinc-800 bg-zinc-900/50">
            @foreach ($pages as $p)
                <li class="flex flex-col gap-2 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">
                    <div>
                        <p class="font-medium text-white">{{ $p->title }}</p>
                        <p class="text-xs text-zinc-500">{{ route('pages.show', $p->slug) }}</p>
                    </div>
                    <a
                        href="{{ route('admin.site-pages.edit', $p) }}"
                        class="inline-flex shrink-0 items-center justify-center rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-zinc-950 hover:bg-amber-400"
                    >
                        {{ __('Edit') }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

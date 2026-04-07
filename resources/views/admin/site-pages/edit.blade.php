@extends('layouts.admin-app')

@section('title', __('Edit').' — '.$page->title)

@section('page_heading', $page->title)

@section('main')
    <div class="mx-auto max-w-4xl">
        @if (session('status'))
            <p class="mb-4 rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200" role="status">
                {{ session('status') }}
            </p>
        @endif

        @if ($page->slug === 'services')
            <p class="mb-6 rounded-lg border border-amber-900/40 bg-amber-950/20 px-4 py-3 text-sm text-amber-100/90">
                {{ __('Service cards (image, title, description) are managed under') }}
                <a href="{{ route('admin.services.index') }}" class="font-medium text-amber-400 underline hover:text-amber-300">{{ __('Services') }}</a>.
                {{ __('Use the fields below only for an optional intro HTML block above the grid.') }}
            </p>
        @elseif ($page->slug === 'about')
            <p class="mb-6 rounded-lg border border-amber-900/40 bg-amber-950/20 px-4 py-3 text-sm text-amber-100/90">
                {{ __('About cards are managed under') }}
                <a href="{{ route('admin.about-items.index') }}" class="font-medium text-amber-400 underline hover:text-amber-300">{{ __('About items') }}</a>.
                {{ __('Optional intro HTML only here.') }}
            </p>
        @elseif ($page->slug === 'contact')
            <p class="mb-6 rounded-lg border border-amber-900/40 bg-amber-950/20 px-4 py-3 text-sm text-amber-100/90">
                {{ __('Contact info cards are managed under') }}
                <a href="{{ route('admin.contact-items.index') }}" class="font-medium text-amber-400 underline hover:text-amber-300">{{ __('Contact items') }}</a>.
                {{ __('Optional intro HTML only here. The message form stays on the page.') }}
            </p>
        @elseif ($page->slug === 'products')
            <p class="mb-6 rounded-lg border border-amber-900/40 bg-amber-950/20 px-4 py-3 text-sm text-amber-100/90">
                {{ __('Product grid is managed under') }}
                <a href="{{ route('admin.products.index') }}" class="font-medium text-amber-400 underline hover:text-amber-300">{{ __('Products') }}</a>.
                {{ __('Optional intro HTML only here.') }}
            </p>
        @endif

        <form method="post" action="{{ route('admin.site-pages.update', $page) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-zinc-300">{{ __('Title') }}</label>
                <input
                    id="title"
                    name="title"
                    type="text"
                    value="{{ old('title', $page->title) }}"
                    required
                    class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white focus:border-amber-500/70 focus:outline-none focus:ring-2 focus:ring-amber-500/30"
                />
                @error('title')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subtitle" class="block text-sm font-medium text-zinc-300">{{ __('Subtitle') }}</label>
                <input
                    id="subtitle"
                    name="subtitle"
                    type="text"
                    value="{{ old('subtitle', $page->subtitle) }}"
                    class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white focus:border-amber-500/70 focus:outline-none focus:ring-2 focus:ring-amber-500/30"
                />
                @error('subtitle')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-zinc-300">{{ __('Page content (HTML)') }}</label>
                <p class="mt-1 text-xs text-zinc-500">
                    {{ __('Optional. When empty, the public page uses the original section design. When filled, this HTML is shown below the title (Bootstrap / theme classes from the home template work here).') }}
                </p>
                <textarea
                    id="body"
                    name="body"
                    rows="18"
                    class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 font-mono text-sm text-zinc-100 focus:border-amber-500/70 focus:outline-none focus:ring-2 focus:ring-amber-500/30"
                >{{ old('body', $page->body) }}</textarea>
                @error('body')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap gap-3">
                <button
                    type="submit"
                    class="rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-zinc-950 hover:bg-amber-400"
                >
                    {{ __('Save') }}
                </button>
                <a
                    href="{{ route('pages.show', $page->slug) }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center rounded-lg border border-zinc-600 px-5 py-2.5 text-sm font-medium text-zinc-200 hover:border-zinc-500"
                >
                    {{ __('View on site') }}
                </a>
                <a
                    href="{{ route('admin.site-pages.index') }}"
                    class="inline-flex items-center rounded-lg border border-zinc-700 px-5 py-2.5 text-sm text-zinc-400 hover:text-white"
                >
                    {{ __('Back to list') }}
                </a>
            </div>
        </form>
    </div>
@endsection

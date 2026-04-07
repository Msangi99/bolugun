@extends('layouts.admin-app')

@section('title', __('Edit').' — '.$service->title)

@section('page_heading', $service->title)

@section('main')
    <div class="mx-auto max-w-2xl">
        @if (session('status'))
            <p class="mb-4 rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200" role="status">
                {{ session('status') }}
            </p>
        @endif

        <form method="post" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-zinc-300">{{ __('Title') }}</label>
                <input
                    id="title"
                    name="title"
                    type="text"
                    value="{{ old('title', $service->title) }}"
                    required
                    class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white focus:border-amber-500/70 focus:outline-none focus:ring-2 focus:ring-amber-500/30"
                />
                @error('title')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-zinc-300">{{ __('Description') }}</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    required
                    class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white focus:border-amber-500/70 focus:outline-none focus:ring-2 focus:ring-amber-500/30"
                >{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-zinc-300">{{ __('Current image') }}</label>
                @if ($service->imageUrl())
                    <div class="mt-2 flex items-center gap-4">
                        <img
                            src="{{ $service->imageUrl() }}"
                            alt=""
                            class="size-24 rounded-lg border border-zinc-700 object-cover"
                        >
                    </div>
                @else
                    <p class="mt-2 text-sm text-zinc-500">{{ __('No image uploaded.') }}</p>
                @endif
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-zinc-300">{{ __('Replace image') }}</label>
                <p class="mt-1 text-xs text-zinc-500">{{ __('Leave empty to keep the current file. Max 4 MB.') }}</p>
                <input
                    id="image"
                    name="image"
                    type="file"
                    accept="image/jpeg,image/png,image/webp,image/gif"
                    class="mt-2 block w-full text-sm text-zinc-400 file:me-4 file:rounded-lg file:border-0 file:bg-zinc-800 file:px-4 file:py-2 file:text-sm file:font-medium file:text-zinc-200"
                />
                @error('image')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="sort_order" class="block text-sm font-medium text-zinc-300">{{ __('Sort order') }}</label>
                <input
                    id="sort_order"
                    name="sort_order"
                    type="number"
                    min="0"
                    max="65535"
                    value="{{ old('sort_order', $service->sort_order) }}"
                    class="mt-2 w-32 rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white focus:border-amber-500/70 focus:outline-none focus:ring-2 focus:ring-amber-500/30"
                />
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap gap-3">
                <button type="submit" class="rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-zinc-950 hover:bg-amber-400">
                    {{ __('Save') }}
                </button>
                <a
                    href="{{ route('pages.show', 'services') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center rounded-lg border border-zinc-600 px-5 py-2.5 text-sm font-medium text-zinc-200 hover:border-zinc-500"
                >
                    {{ __('View on site') }}
                </a>
                <a href="{{ route('admin.services.index') }}" class="inline-flex items-center rounded-lg border border-zinc-700 px-5 py-2.5 text-sm text-zinc-400 hover:text-white">
                    {{ __('Back to list') }}
                </a>
            </div>
        </form>
    </div>
@endsection

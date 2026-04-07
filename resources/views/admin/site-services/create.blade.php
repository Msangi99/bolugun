@extends('layouts.admin-app')

@section('title', __('Add service'))

@section('page_heading', __('Add service'))

@section('main')
    <div class="mx-auto max-w-2xl">
        <form method="post" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-zinc-300">{{ __('Title') }}</label>
                <input
                    id="title"
                    name="title"
                    type="text"
                    value="{{ old('title') }}"
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
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-zinc-300">{{ __('Image') }}</label>
                <p class="mt-1 text-xs text-zinc-500">{{ __('Square or landscape photos work best. JPEG, PNG, WebP or GIF, max 4 MB.') }}</p>
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
                    value="{{ old('sort_order', 0) }}"
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
                <a href="{{ route('admin.services.index') }}" class="inline-flex items-center rounded-lg border border-zinc-700 px-5 py-2.5 text-sm text-zinc-400 hover:text-white">
                    {{ __('Cancel') }}
                </a>
            </div>
        </form>
    </div>
@endsection

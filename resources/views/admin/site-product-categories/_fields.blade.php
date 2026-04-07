<div>
    <label for="name" class="block text-sm font-medium text-zinc-300">{{ __('Name') }}</label>
    <input id="name" name="name" type="text" value="{{ old('name', $category?->name) }}" required class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
    @error('name')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="slug" class="block text-sm font-medium text-zinc-300">{{ __('URL slug') }}</label>
    <p class="mt-1 text-xs text-zinc-500">{{ __('Lowercase letters, numbers, hyphens only. Leave blank to generate from the name.') }}</p>
    <input id="slug" name="slug" type="text" value="{{ old('slug', $category?->slug) }}" pattern="[a-z0-9]+(?:-[a-z0-9]+)*" class="mt-2 w-full max-w-md rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white" placeholder="{{ __('e.g. residential') }}">
    @error('slug')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="image" class="block text-sm font-medium text-zinc-300">{{ __('Image') }}</label>
    <p class="mt-1 text-xs text-zinc-500">{{ __('Shown on the public Products page as the category card. Max 4 MB.') }}</p>
    @if ($category?->imageUrl())
        <img src="{{ $category->imageUrl() }}" alt="" class="my-2 max-h-40 rounded-lg object-cover">
    @endif
    <input id="image" name="image" type="file" accept="image/*" class="mt-2 block w-full text-sm text-zinc-400 file:me-4 file:rounded-lg file:border-0 file:bg-zinc-800 file:px-4 file:py-2 file:text-zinc-200">
    @error('image')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="sort_order" class="block text-sm font-medium text-zinc-300">{{ __('Sort order') }}</label>
    <input id="sort_order" name="sort_order" type="number" min="0" max="65535" value="{{ old('sort_order', $category?->sort_order ?? 0) }}" class="mt-2 w-32 rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
    @error('sort_order')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>

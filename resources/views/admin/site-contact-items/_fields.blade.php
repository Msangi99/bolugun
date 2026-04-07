<div>
    <label for="title" class="block text-sm font-medium text-zinc-300">{{ __('Title') }}</label>
    <input id="title" name="title" type="text" value="{{ old('title', $item?->title) }}" required class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
    @error('title')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="body" class="block text-sm font-medium text-zinc-300">{{ __('Text') }}</label>
    <p class="mt-1 text-xs text-zinc-500">{{ __('Use new lines for separate lines (e.g. address).') }}</p>
    <textarea id="body" name="body" rows="5" required class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">{{ old('body', $item?->body) }}</textarea>
    @error('body')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="icon_class" class="block text-sm font-medium text-zinc-300">{{ __('Icon (Bootstrap Icons)') }}</label>
    <p class="mt-1 text-xs text-zinc-500">{{ __('Suffix only, e.g. geo-alt, telephone, envelope, clock. Ignored if an image is uploaded.') }}</p>
    <input id="icon_class" name="icon_class" type="text" value="{{ old('icon_class', $item?->icon_class) }}" placeholder="geo-alt" class="mt-2 w-full max-w-xs rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
    @error('icon_class')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="image" class="block text-sm font-medium text-zinc-300">{{ __('Image') }}</label>
    <p class="mt-1 text-xs text-zinc-500">{{ __('Optional. Replaces the icon. Max 4 MB.') }}</p>
    @if ($item?->imageUrl())
        <img src="{{ $item->imageUrl() }}" alt="" class="my-2 size-24 rounded-lg object-cover">
    @endif
    <input id="image" name="image" type="file" accept="image/*" class="mt-2 block w-full text-sm text-zinc-400 file:me-4 file:rounded-lg file:border-0 file:bg-zinc-800 file:px-4 file:py-2 file:text-zinc-200">
    @error('image')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="sort_order" class="block text-sm font-medium text-zinc-300">{{ __('Sort order') }}</label>
    <input id="sort_order" name="sort_order" type="number" min="0" max="65535" value="{{ old('sort_order', $item?->sort_order ?? 0) }}" class="mt-2 w-32 rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
    @error('sort_order')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>

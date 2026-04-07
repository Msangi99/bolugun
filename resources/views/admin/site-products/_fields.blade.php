<div>
    <label for="title" class="block text-sm font-medium text-zinc-300">{{ __('Title') }}</label>
    <input id="title" name="title" type="text" value="{{ old('title', $product?->title) }}" required class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
    @error('title')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="description" class="block text-sm font-medium text-zinc-300">{{ __('Description') }}</label>
    <textarea id="description" name="description" rows="3" required class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">{{ old('description', $product?->description) }}</textarea>
    @error('description')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="tag" class="block text-sm font-medium text-zinc-300">{{ __('Badge / tag') }}</label>
    <input id="tag" name="tag" type="text" value="{{ old('tag', $product?->tag) }}" required class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white" placeholder="{{ __('e.g. Residential') }}">
    @error('tag')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <div class="flex flex-wrap items-end justify-between gap-2">
        <label for="site_product_category_id" class="block text-sm font-medium text-zinc-300">{{ __('Category') }}</label>
        <p class="text-xs text-zinc-500">
            <a href="{{ route('admin.product-categories.create') }}" target="_blank" rel="noopener" class="text-amber-500 hover:underline">{{ __('New category') }}</a>
            <span class="text-zinc-600">·</span>
            <a href="{{ route('admin.product-categories.index') }}" target="_blank" rel="noopener" class="text-zinc-400 hover:text-amber-400 hover:underline">{{ __('Manage all') }}</a>
        </p>
    </div>
    @if ($categories->isEmpty())
        <p class="mt-2 text-sm text-amber-400">{{ __('Create at least one category before adding a product.') }}</p>
        <a href="{{ route('admin.product-categories.create') }}" class="mt-2 inline-block text-sm text-amber-500 hover:underline">{{ __('Add category') }}</a>
    @else
        <select id="site_product_category_id" name="site_product_category_id" required class="mt-2 w-full max-w-md rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @selected((string) old('site_product_category_id', $product?->site_product_category_id) === (string) $cat->id)>{{ $cat->name }}</option>
            @endforeach
        </select>
        <p class="mt-1 text-xs text-zinc-500">{{ __('Reload this page after creating a category to see it in the list.') }}</p>
    @endif
    @error('site_product_category_id')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="image" class="block text-sm font-medium text-zinc-300">{{ __('Image') }}</label>
    <p class="mt-1 text-xs text-zinc-500">{{ __('Optional for first save; you can use a remote URL in the database via tinker, or upload here. Max 4 MB.') }}</p>
    @if ($product?->imageUrl())
        <img src="{{ $product->imageUrl() }}" alt="" class="my-2 max-h-40 rounded-lg object-cover">
    @endif
    <input id="image" name="image" type="file" accept="image/*" class="mt-2 block w-full text-sm text-zinc-400 file:me-4 file:rounded-lg file:border-0 file:bg-zinc-800 file:px-4 file:py-2 file:text-zinc-200">
    @error('image')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="sort_order" class="block text-sm font-medium text-zinc-300">{{ __('Sort order') }}</label>
    <input id="sort_order" name="sort_order" type="number" min="0" max="65535" value="{{ old('sort_order', $product?->sort_order ?? 0) }}" class="mt-2 w-32 rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
    @error('sort_order')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>

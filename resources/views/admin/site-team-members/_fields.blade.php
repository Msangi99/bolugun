<div>
    <label for="name" class="block text-sm font-medium text-zinc-300">{{ __('Name') }}</label>
    <input id="name" name="name" type="text" value="{{ old('name', $member?->name) }}" required class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
    @error('name')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="role" class="block text-sm font-medium text-zinc-300">{{ __('Role / title') }}</label>
    <input id="role" name="role" type="text" value="{{ old('role', $member?->role) }}" required class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white" placeholder="{{ __('e.g. Project Manager') }}">
    @error('role')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="image" class="block text-sm font-medium text-zinc-300">{{ __('Photo') }}</label>
    <p class="mt-1 text-xs text-zinc-500">{{ __('Shown on the home page team section. Max 4 MB.') }}</p>
    @if ($member?->imageUrl())
        <img src="{{ $member->imageUrl() }}" alt="" class="my-2 max-h-40 rounded-lg object-cover">
    @endif
    <input id="image" name="image" type="file" accept="image/*" class="mt-2 block w-full text-sm text-zinc-400 file:me-4 file:rounded-lg file:border-0 file:bg-zinc-800 file:px-4 file:py-2 file:text-zinc-200">
    @error('image')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="twitter_url" class="block text-sm font-medium text-zinc-300">{{ __('X (Twitter) URL') }}</label>
    <input id="twitter_url" name="twitter_url" type="url" value="{{ old('twitter_url', $member?->twitter_url) }}" class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white" placeholder="https://">
    @error('twitter_url')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="facebook_url" class="block text-sm font-medium text-zinc-300">{{ __('Facebook URL') }}</label>
    <input id="facebook_url" name="facebook_url" type="url" value="{{ old('facebook_url', $member?->facebook_url) }}" class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white" placeholder="https://">
    @error('facebook_url')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="linkedin_url" class="block text-sm font-medium text-zinc-300">{{ __('LinkedIn URL') }}</label>
    <input id="linkedin_url" name="linkedin_url" type="url" value="{{ old('linkedin_url', $member?->linkedin_url) }}" class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white" placeholder="https://">
    @error('linkedin_url')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>
<div>
    <label for="sort_order" class="block text-sm font-medium text-zinc-300">{{ __('Sort order') }}</label>
    <input id="sort_order" name="sort_order" type="number" min="0" max="65535" value="{{ old('sort_order', $member?->sort_order ?? 0) }}" class="mt-2 w-32 rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2 text-white">
    @error('sort_order')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
</div>

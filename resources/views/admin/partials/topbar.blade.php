<header class="sticky top-0 z-20 flex h-14 shrink-0 items-center gap-3 border-b border-zinc-800 bg-zinc-950/90 px-3 backdrop-blur-md sm:h-16 sm:gap-4 sm:px-4 md:px-6 lg:px-8">
    <button
        type="button"
        data-admin-sidebar-open
        class="inline-flex size-10 items-center justify-center rounded-lg border border-zinc-800 text-zinc-300 transition hover:border-zinc-600 hover:bg-zinc-900 hover:text-white lg:hidden"
        aria-controls="admin-sidebar"
        aria-expanded="false"
        aria-label="{{ __('Open menu') }}"
    >
        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>

    <div class="min-w-0 flex-1">
        <p class="text-xs font-medium uppercase tracking-widest text-amber-500/90">{{ __('Admin') }}</p>
        <h1 class="truncate text-lg font-semibold text-white sm:text-xl md:text-2xl">
            @hasSection('page_heading')
                @yield('page_heading')
            @else
                {{ config('app.name') }}
            @endif
        </h1>
    </div>

    @auth
        <p class="hidden max-w-[12rem] truncate text-sm text-zinc-400 sm:max-w-xs md:block md:text-base">
            {{ auth()->user()->email }}
        </p>
    @endauth
</header>

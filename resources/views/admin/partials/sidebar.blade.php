@php
    $dashboardActive = request()->routeIs('admin.dashboard');
    $sitePagesActive = request()->routeIs('admin.site-pages.*');
    $servicesActive = request()->routeIs('admin.services.*');
    $aboutItemsActive = request()->routeIs('admin.about-items.*');
    $teamMembersActive = request()->routeIs('admin.team-members.*');
    $contactItemsActive = request()->routeIs('admin.contact-items.*');
    $contactMessagesActive = request()->routeIs('admin.contact-messages.*');
    $productsActive = request()->routeIs('admin.products.*');
    $productCategoriesActive = request()->routeIs('admin.product-categories.*');
@endphp

<aside
    id="admin-sidebar"
    data-admin-sidebar
    class="fixed inset-y-0 left-0 z-40 flex w-[min(100vw,17rem)] shrink-0 -translate-x-full flex-col border-r border-zinc-800 bg-zinc-900/95 backdrop-blur-md transition-transform duration-200 ease-out sm:w-64 lg:static lg:z-0 lg:w-64 lg:shrink-0 lg:translate-x-0"
>
    <div class="flex h-14 items-center justify-between gap-2 border-b border-zinc-800 px-4 sm:h-16 sm:px-5">
        <a href="{{ route('admin.dashboard') }}" class="truncate text-sm font-semibold text-white sm:text-base">
            {{ config('app.name') }}
        </a>
        <button
            type="button"
            data-admin-sidebar-close
            class="inline-flex size-9 items-center justify-center rounded-lg text-zinc-400 transition hover:bg-zinc-800 hover:text-white lg:hidden"
            aria-label="{{ __('Close menu') }}"
        >
            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <nav class="flex-1 space-y-1 overflow-y-auto p-3 sm:p-4" aria-label="{{ __('Admin navigation') }}">
        <a
            href="{{ route('admin.dashboard') }}"
            @class([
                'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition sm:text-base',
                'bg-amber-500/15 text-amber-400' => $dashboardActive,
                'text-zinc-400 hover:bg-zinc-800/80 hover:text-white' => ! $dashboardActive,
            ])
        >
            <svg class="size-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            {{ __('Dashboard') }}
        </a>
        <a
            href="{{ route('admin.site-pages.index') }}"
            @class([
                'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition sm:text-base',
                'bg-amber-500/15 text-amber-400' => $sitePagesActive,
                'text-zinc-400 hover:bg-zinc-800/80 hover:text-white' => ! $sitePagesActive,
            ])
        >
            <svg class="size-5 shrink-0 opacity-80" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>
            {{ __('Site pages') }}
        </a>
        <p class="px-3 pt-2 text-[10px] font-semibold uppercase tracking-wider text-zinc-600">{{ __('Content') }}</p>
        <a
            href="{{ route('admin.services.index') }}"
            @class([
                'flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition sm:text-base',
                'bg-amber-500/15 text-amber-400' => $servicesActive,
                'text-zinc-400 hover:bg-zinc-800/80 hover:text-white' => ! $servicesActive,
            ])
        >{{ __('Services') }}</a>
        <a
            href="{{ route('admin.about-items.index') }}"
            @class([
                'flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition sm:text-base',
                'bg-amber-500/15 text-amber-400' => $aboutItemsActive,
                'text-zinc-400 hover:bg-zinc-800/80 hover:text-white' => ! $aboutItemsActive,
            ])
        >{{ __('About items') }}</a>
        <a
            href="{{ route('admin.team-members.index') }}"
            @class([
                'flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition sm:text-base',
                'bg-amber-500/15 text-amber-400' => $teamMembersActive,
                'text-zinc-400 hover:bg-zinc-800/80 hover:text-white' => ! $teamMembersActive,
            ])
        >{{ __('Team') }}</a>
        <a
            href="{{ route('admin.contact-items.index') }}"
            @class([
                'flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition sm:text-base',
                'bg-amber-500/15 text-amber-400' => $contactItemsActive,
                'text-zinc-400 hover:bg-zinc-800/80 hover:text-white' => ! $contactItemsActive,
            ])
        >{{ __('Contact items') }}</a>
        <a
            href="{{ route('admin.contact-messages.index') }}"
            @class([
                'flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition sm:text-base',
                'bg-amber-500/15 text-amber-400' => $contactMessagesActive,
                'text-zinc-400 hover:bg-zinc-800/80 hover:text-white' => ! $contactMessagesActive,
            ])
        >{{ __('Contact messages') }}</a>
        <a
            href="{{ route('admin.product-categories.index') }}"
            @class([
                'flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition sm:text-base',
                'bg-amber-500/15 text-amber-400' => $productCategoriesActive,
                'text-zinc-400 hover:bg-zinc-800/80 hover:text-white' => ! $productCategoriesActive,
            ])
        >{{ __('Product categories') }}</a>
        <a
            href="{{ route('admin.products.index') }}"
            @class([
                'flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition sm:text-base',
                'bg-amber-500/15 text-amber-400' => $productsActive,
                'text-zinc-400 hover:bg-zinc-800/80 hover:text-white' => ! $productsActive,
            ])
        >{{ __('Products') }}</a>
    </nav>

    <div class="border-t border-zinc-800 p-3 sm:p-4">
        @auth
            <p class="truncate text-xs text-zinc-500 sm:text-sm">{{ auth()->user()->email }}</p>
        @endauth
        <form method="post" action="{{ route('admin.logout') }}" class="mt-3">
            @csrf
            <button
                type="submit"
                class="w-full rounded-lg border border-zinc-700 px-3 py-2 text-left text-sm font-medium text-zinc-200 transition hover:border-zinc-500 hover:bg-zinc-800 sm:py-2.5"
            >
                {{ __('Log out') }}
            </button>
        </form>
    </div>
</aside>

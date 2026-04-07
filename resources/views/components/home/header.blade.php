<header id="header" class="header d-flex align-items-center sticky-top" data-builder="header" data-js="scrolled scroll-up-sticky">
    <div class="container-fluid container-xxl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
            <span class="logo-icon d-flex align-items-center justify-content-center"><i class="bi bi-buildings"></i></span>
            <h1 class="sitename">{{ config('app.name') }}</h1>
        </a>

        <nav id="navmenu" class="navmenu" data-builder="navmenu" data-js="mobile-nav-toggle mobile-nav-dropdown">
            <ul>
                <li><a href="{{ route('home') }}" @class(['', 'active' => request()->routeIs('home')])>{{ __('Home') }}</a></li>
                <li><a href="{{ route('pages.show', 'about') }}" @class(['active' => request()->routeIs('pages.show') && request()->route('slug') === 'about'])>{{ __('About') }}</a></li>
                <li><a href="{{ route('pages.show', 'services') }}" @class(['active' => request()->routeIs('pages.show') && request()->route('slug') === 'services'])>{{ __('Services') }}</a></li>
                <li><a href="{{ route('pages.show', 'products') }}" @class(['active' => request()->routeIs('pages.show') && request()->route('slug') === 'products'])>{{ __('Products') }}</a></li>
                <li><a href="{{ route('home') }}#team">{{ __('Team') }}</a></li>
                <li class="dropdown"><a href="#" class="toggle-dropdown"><span>{{ __('Pages') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('pages.show', 'services') }}">{{ __('Service overview') }}</a></li>
                        <li><a href="{{ route('pages.show', 'products') }}">{{ __('Product gallery') }}</a></li>
                        <li><a href="{{ route('pages.show', 'contact') }}">{{ __('Contact') }}</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('pages.show', 'contact') }}" @class(['active' => request()->routeIs('pages.show') && request()->route('slug') === 'contact'])>{{ __('Contact') }}</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @if (Route::has('admin.login'))
            <a class="d-none d-sm-inline-flex align-items-center me-3 small text-secondary" href="{{ route('admin.login') }}">Admin</a>
        @endif

    </div>
</header>

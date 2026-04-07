@extends('layouts.admin')

@section('content')
    <div id="admin-shell" class="relative min-h-screen bg-zinc-950 lg:flex">
        <div
            data-admin-sidebar-backdrop
            class="fixed inset-0 z-30 hidden bg-black/60 backdrop-blur-[2px] lg:!hidden"
            aria-hidden="true"
        ></div>

        @include('admin.partials.sidebar')

        <div class="flex min-h-screen min-w-0 flex-1 flex-col">
            @include('admin.partials.topbar')

            <main class="flex-1 px-3 py-6 sm:px-4 sm:py-8 md:px-6 md:py-10 lg:px-8">
                @yield('main')
            </main>
        </div>
    </div>
@endsection

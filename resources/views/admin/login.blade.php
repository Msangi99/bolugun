@extends('layouts.admin')

@section('title', 'Sign in')

@section('content')
    <div class="flex min-h-screen flex-col justify-center px-4 py-10 sm:px-6 md:px-8 lg:px-10">
        <div class="mx-auto w-full max-w-md">
            <p class="text-center text-xs font-medium uppercase tracking-widest text-amber-500/90 sm:text-sm">
                {{ config('app.name') }}
            </p>
            <h1 class="mt-2 text-center text-2xl font-semibold tracking-tight text-white sm:text-3xl md:text-4xl">
                Admin sign in
            </h1>
            <p class="mt-2 text-center text-sm text-zinc-400 md:text-base">
                Use your admin email and password.
            </p>

            <form
                method="post"
                action="{{ route('admin.login.store') }}"
                class="mt-8 space-y-5 rounded-2xl border border-zinc-800 bg-zinc-900/80 p-6 shadow-xl shadow-black/40 backdrop-blur-sm sm:p-8 md:mt-10"
            >
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-zinc-300">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        autofocus
                        class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2.5 text-sm text-white placeholder:text-zinc-600 focus:border-amber-500/70 focus:outline-none focus:ring-2 focus:ring-amber-500/30 md:py-3 md:text-base"
                    />
                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-zinc-300">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        class="mt-2 w-full rounded-lg border border-zinc-700 bg-zinc-950 px-3 py-2.5 text-sm text-white placeholder:text-zinc-600 focus:border-amber-500/70 focus:outline-none focus:ring-2 focus:ring-amber-500/30 md:py-3 md:text-base"
                    />
                </div>

                <div class="flex items-center gap-2">
                    <input
                        id="remember"
                        name="remember"
                        type="checkbox"
                        value="1"
                        class="size-4 rounded border-zinc-600 bg-zinc-950 text-amber-500 focus:ring-amber-500/40"
                    />
                    <label for="remember" class="text-sm text-zinc-400">Remember me</label>
                </div>

                <button
                    type="submit"
                    class="w-full rounded-lg bg-amber-500 px-4 py-2.5 text-sm font-semibold text-zinc-950 transition hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-400/50 md:py-3 md:text-base"
                >
                    Sign in
                </button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.admin-app')

@section('title', 'Commands')

@section('page_heading', 'Artisan Commands')

@section('main')
    <div class="mx-auto max-w-2xl">
        <div class="rounded-2xl border border-zinc-800 bg-zinc-900/70 p-5 sm:p-6">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-white">Run System Commands</h3>
                <p class="mt-1 text-sm text-zinc-400">Execute Laravel artisan commands to maintain your application</p>
            </div>

            @if (session('success'))
                <div class="mb-4 rounded-lg border border-green-900/50 bg-green-900/30 p-4">
                    <div class="flex gap-3">
                        <svg class="size-5 shrink-0 text-green-400 opacity-80" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.431 12.822 13.049-13.05a2.25 2.25 0 1 1 3.182 3.182L7.613 16.004a2.25 2.25 0 0 1-3.182 0z" />
                        </svg>
                        <div class="text-sm text-green-300">
                            <strong>Success:</strong>
                            <pre class="mt-2 whitespace-pre-wrap font-mono text-xs">{{ session('success') }}</pre>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded-lg border border-red-900/50 bg-red-900/30 p-4">
                    <div class="flex gap-3">
                        <svg class="size-5 shrink-0 text-red-400 opacity-80" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9 15.75h6" />
                        </svg>
                        <div class="text-sm text-red-300">
                            <strong>Error:</strong>
                            <pre class="mt-2 whitespace-pre-wrap font-mono text-xs">{{ session('error') }}</pre>
                        </div>
                    </div>
                </div>
            @endif

            <div class="space-y-3">
                @foreach ($commands as $command => $description)
                    <form method="post" action="{{ route('admin.commands.run') }}" class="flex items-center justify-between rounded-lg border border-zinc-800 bg-zinc-800/30 p-4 transition hover:border-zinc-700 hover:bg-zinc-800/50">
                        @csrf
                        <div class="flex-1">
                            <h4 class="font-mono text-sm font-semibold text-amber-400">php artisan {{ $command }}</h4>
                            <p class="mt-1 text-xs text-zinc-400">{{ $description }}</p>
                        </div>
                        <input type="hidden" name="command" value="{{ $command }}">
                        <button
                            type="submit"
                            class="ml-4 inline-flex items-center gap-2 rounded-lg bg-amber-500 px-4 py-2 text-sm font-medium text-zinc-900 transition hover:bg-amber-400 active:scale-95"
                        >
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>
                            Run
                        </button>
                    </form>
                @endforeach
            </div>

            <div class="mt-6 rounded-lg border border-amber-900/50 bg-amber-900/20 p-4">
                <p class="text-xs text-amber-300">
                    <strong>⚠️ Warning:</strong> These commands modify your application state. Use with caution, especially on production environments.
                </p>
            </div>
        </div>
    </div>
@endsection

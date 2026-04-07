@extends('layouts.admin-app')

@section('title', __('Team'))

@section('page_heading', __('Team members'))

@section('main')
    <div class="mx-auto max-w-5xl space-y-4">
        @if (session('status'))
            <p class="rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200">{{ session('status') }}</p>
        @endif
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-zinc-400">{{ __('Shown on the home page team section. Upload a photo, name, role, and optional social links.') }}</p>
            <a href="{{ route('admin.team-members.create') }}" class="inline-flex shrink-0 rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-zinc-950 hover:bg-amber-400">{{ __('Add member') }}</a>
        </div>
        <div class="overflow-x-auto rounded-xl border border-zinc-800">
            <table class="w-full min-w-[640px] text-left text-sm text-zinc-300">
                <thead class="border-b border-zinc-800 bg-zinc-900/80 text-xs uppercase tracking-wide text-zinc-500">
                    <tr>
                        <th class="px-4 py-3">{{ __('Photo') }}</th>
                        <th class="px-4 py-3">{{ __('Name') }}</th>
                        <th class="px-4 py-3">{{ __('Role') }}</th>
                        <th class="px-4 py-3">{{ __('Order') }}</th>
                        <th class="px-4 py-3 text-end">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @forelse ($members as $m)
                        <tr>
                            <td class="px-4 py-3">
                                @if ($m->imageUrl())
                                    <img src="{{ $m->imageUrl() }}" alt="" class="size-12 rounded-lg object-cover">
                                @else
                                    <span class="text-zinc-600">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-medium text-white">{{ $m->name }}</td>
                            <td class="px-4 py-3 text-zinc-500">{{ $m->role }}</td>
                            <td class="px-4 py-3 text-zinc-500">{{ $m->sort_order }}</td>
                            <td class="px-4 py-3 text-end">
                                <a href="{{ route('admin.team-members.edit', $m) }}" class="me-2 text-amber-400 hover:underline">{{ __('Edit') }}</a>
                                <form method="post" action="{{ route('admin.team-members.destroy', $m) }}" class="inline" onsubmit="return confirm(@json(__('Delete?')))">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-8 text-center text-zinc-500">{{ __('No team members.') }} <a href="{{ route('admin.team-members.create') }}" class="text-amber-500 hover:underline">{{ __('Add one') }}</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

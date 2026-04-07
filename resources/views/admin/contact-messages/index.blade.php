@extends('layouts.admin-app')

@section('title', __('Contact messages'))

@section('page_heading', __('Contact form messages'))

@section('main')
    <div class="mx-auto max-w-5xl space-y-4">
        @if (session('status'))
            <p class="rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200">{{ session('status') }}</p>
        @endif
        <p class="text-sm text-zinc-400">{{ __('Submissions from the public Contact page form.') }}</p>
        <div class="overflow-x-auto rounded-xl border border-zinc-800">
            <table class="w-full min-w-[640px] text-left text-sm text-zinc-300">
                <thead class="border-b border-zinc-800 bg-zinc-900/80 text-xs uppercase text-zinc-500">
                    <tr>
                        <th class="px-4 py-3">{{ __('Date') }}</th>
                        <th class="px-4 py-3">{{ __('Name') }}</th>
                        <th class="px-4 py-3">{{ __('Email') }}</th>
                        <th class="px-4 py-3">{{ __('Subject') }}</th>
                        <th class="px-4 py-3 text-end">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800">
                    @forelse ($messages as $message)
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-zinc-500">{{ $message->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-3 font-medium text-white">{{ $message->name }}</td>
                            <td class="px-4 py-3"><a href="mailto:{{ $message->email }}" class="text-amber-400 hover:underline">{{ $message->email }}</a></td>
                            <td class="px-4 py-3 max-w-xs truncate" title="{{ $message->subject }}">{{ $message->subject }}</td>
                            <td class="px-4 py-3 text-end">
                                <a href="{{ route('admin.contact-messages.show', $message) }}" class="text-amber-400 hover:underline">{{ __('View') }}</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-8 text-center text-zinc-500">{{ __('No messages yet.') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($messages->hasPages())
            <div class="text-sm text-zinc-500">{{ $messages->links() }}</div>
        @endif
    </div>
@endsection

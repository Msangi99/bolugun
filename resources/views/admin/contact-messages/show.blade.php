@extends('layouts.admin-app')

@section('title', __('Message'))

@section('page_heading', __('Contact message'))

@section('main')
    <div class="mx-auto max-w-3xl space-y-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-amber-400 hover:underline">{{ __('← Back to list') }}</a>
            <form method="post" action="{{ route('admin.contact-messages.destroy', $message) }}" class="inline" onsubmit="return confirm(@json(__('Delete this message?')))">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm text-red-400 hover:underline">{{ __('Delete') }}</button>
            </form>
        </div>
        <div class="rounded-xl border border-zinc-800 bg-zinc-900/40 p-4 sm:p-6">
            <dl class="space-y-4 text-sm">
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">{{ __('Received') }}</dt>
                    <dd class="mt-1 text-zinc-200">{{ $message->created_at->format('Y-m-d H:i:s') }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">{{ __('Name') }}</dt>
                    <dd class="mt-1 text-white">{{ $message->name }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">{{ __('Email') }}</dt>
                    <dd class="mt-1"><a href="mailto:{{ $message->email }}" class="text-amber-400 hover:underline">{{ $message->email }}</a></dd>
                </div>
                @if ($message->phone)
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">{{ __('Phone') }}</dt>
                        <dd class="mt-1"><a href="tel:{{ preg_replace('/\s+/', '', $message->phone) }}" class="text-amber-400 hover:underline">{{ $message->phone }}</a></dd>
                    </div>
                @endif
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">{{ __('Topic') }}</dt>
                    <dd class="mt-1 text-zinc-200">{{ \App\Models\ContactMessage::serviceLabel($message->service) }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">{{ __('Subject') }}</dt>
                    <dd class="mt-1 text-white">{{ $message->subject }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">{{ __('Message') }}</dt>
                    <dd class="mt-1 whitespace-pre-wrap text-zinc-300">{{ $message->message }}</dd>
                </div>
                @if ($message->ip_address)
                    <div>
                        <dt class="text-xs font-semibold uppercase tracking-wider text-zinc-500">{{ __('IP') }}</dt>
                        <dd class="mt-1 font-mono text-zinc-500">{{ $message->ip_address }}</dd>
                    </div>
                @endif
            </dl>
        </div>
    </div>
@endsection

@extends('layouts.admin-app')

@section('title', __('Edit team member'))

@section('page_heading', $member->name)

@section('main')
    <div class="mx-auto max-w-2xl">
        @if (session('status'))
            <p class="mb-4 rounded-lg border border-emerald-800/60 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200">{{ session('status') }}</p>
        @endif
        <form method="post" action="{{ route('admin.team-members.update', $member) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            @include('admin.site-team-members._fields', ['member' => $member])
            <div class="flex flex-wrap gap-3">
                <button type="submit" class="rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-zinc-950 hover:bg-amber-400">{{ __('Save') }}</button>
                <a href="{{ route('home') }}" target="_blank" class="rounded-lg border border-zinc-600 px-5 py-2.5 text-sm text-zinc-200">{{ __('View home') }}</a>
                <a href="{{ route('admin.team-members.index') }}" class="rounded-lg border border-zinc-700 px-5 py-2.5 text-sm text-zinc-400">{{ __('Back') }}</a>
            </div>
        </form>
    </div>
@endsection

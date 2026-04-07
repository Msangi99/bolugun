@extends('layouts.admin-app')

@section('title', __('Add contact item'))

@section('page_heading', __('Add contact item'))

@section('main')
    <div class="mx-auto max-w-2xl">
        <form method="post" action="{{ route('admin.contact-items.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('admin.site-contact-items._fields', ['item' => null])
            <div class="flex gap-3">
                <button type="submit" class="rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-zinc-950 hover:bg-amber-400">{{ __('Save') }}</button>
                <a href="{{ route('admin.contact-items.index') }}" class="rounded-lg border border-zinc-700 px-5 py-2.5 text-sm text-zinc-400">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
@endsection

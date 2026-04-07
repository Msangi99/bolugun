@extends('layouts.site')

@php
    $pageTitle = $page?->title ?? ucfirst($slug);
@endphp

@section('title', $pageTitle.' — '.config('app.name'))

@section('content')
    <x-home.header />
    <main class="main" id="page-{{ $slug }}">
        @if ($slug === 'services')
            @include('pages.partials.services-public', ['page' => $page, 'services' => $siteServices])
        @elseif ($slug === 'about')
            @include('pages.partials.about-public', ['page' => $page, 'items' => $aboutItems])
        @elseif ($slug === 'contact')
            @include('pages.partials.contact-public', ['page' => $page, 'items' => $contactItems])
        @elseif ($slug === 'products')
            @include('pages.partials.products-public', [
                'page' => $page,
                'products' => $siteProducts,
                'siteProductCategories' => $siteProductCategories,
            ])
        @elseif ($page && filled($page->body))
            <section class="page-title section">
                <div class="container">
                    <h1>{{ $page->title }}</h1>
                    @if (filled($page->subtitle))
                        <p class="lead text-muted mb-0">{{ $page->subtitle }}</p>
                    @endif
                </div>
            </section>
            <div class="page-custom-body">
                {!! $page->body !!}
            </div>
        @else
            @include('components.home.'.$slug)
        @endif
    </main>
    <x-home.footer />
    <x-home.scroll-top />
@endsection

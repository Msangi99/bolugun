@extends('layouts.site')

@php
    $fallbackImg = 'https://builder.bootstrapmade.com/static/img/construction/project-1.webp';
@endphp

@section('title', $category->name.' — '.config('app.name'))

@section('content')
    <x-home.header />
    <main class="main" id="page-product-category">
        <section class="page-title section">
            <div class="container">
                <p class="mb-2">
                    <a href="{{ route('pages.show', 'products') }}" class="text-decoration-none">
                        <i class="bi bi-arrow-left"></i> {{ __('All Categories') }}
                    </a>
                </p>
                <h1 class="mb-0">{{ $category->name }}</h1>
            </div>
        </section>

        <section id="products" class="projects section" data-builder="section">
            <div class="container aos-init" data-aos="fade-up" data-aos-delay="100">
                @if ($products->isEmpty())
                    <p class="text-center text-muted py-5 mb-0">{{ __('No products in this category yet.') }}</p>
                @else
                    <div class="row g-4">
                        @foreach ($products as $product)
                            @php
                                $img = $product->imageUrl() ?? $fallbackImg;
                            @endphp
                            <div class="col-lg-4 col-md-6">
                                <div class="project-card">
                                    <img src="{{ $img }}" alt="{{ $product->title }}" class="img-fluid" loading="lazy" width="800" height="600">
                                    <div class="card-overlay">
                                        <div class="card-content">
                                            <span class="tag">{{ $product->tag }}</span>
                                            <h3>{{ $product->title }}</h3>
                                            <p>{{ $product->description }}</p>
                                        </div>
                                        <div class="card-actions">
                                            <a href="{{ $img }}" class="card-action glightbox" data-gallery="products" title="{{ __('Fullscreen') }}"><i class="bi bi-arrows-fullscreen"></i></a>
                                            <a href="{{ route('pages.show', 'products') }}" class="card-action" title="{{ __('Categories') }}"><i class="bi bi-grid-3x3-gap"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>
    <x-home.footer />
    <x-home.scroll-top />
@endsection

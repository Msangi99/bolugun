@props([
    'categories' => collect(),
    'products' => collect(),
])

@php
    $fallbackImg = 'https://builder.bootstrapmade.com/static/img/construction/project-1.webp';
@endphp

<div id="product-catalog" class="container aos-init" data-aos="fade-up" data-aos-delay="100">
    @if ($categories->isNotEmpty())
        <div class="product-category-cards row g-3 g-md-4">
            @foreach ($categories as $cat)
                @php
                    $catImg = $cat->imageUrl() ?? $fallbackImg;
                @endphp
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('products.category', $cat->slug) }}" class="product-category-card project-card d-block text-decoration-none">
                        <img src="{{ $catImg }}" alt="{{ $cat->name }}" class="img-fluid" loading="lazy" width="600" height="450">
                        <div class="card-overlay">
                            <div class="card-content">
                                <h3 class="mb-0">{{ $cat->name }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @elseif ($products->isEmpty())
        <p class="text-center text-muted py-5 mb-0">{{ __('No products to show yet.') }}</p>
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
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

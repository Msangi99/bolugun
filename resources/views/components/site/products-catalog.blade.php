@props([
    'categories' => collect(),
    'products' => collect(),
])

@php
    $fallbackImg = 'https://builder.bootstrapmade.com/static/img/construction/project-1.webp';
@endphp

<div id="product-catalog" class="container aos-init" data-aos="fade-up" data-aos-delay="100">
    @if ($categories->isNotEmpty() && $products->isEmpty())
        <div class="product-category-cards row g-3 g-md-4">
            @foreach ($categories as $cat)
                @php
                    $catImg = $cat->imageUrl() ?? $fallbackImg;
                @endphp
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="project-card product-category-card-static">
                        <img src="{{ $catImg }}" alt="{{ $cat->name }}" class="img-fluid" loading="lazy" width="600" height="450">
                        <div class="card-overlay">
                            <div class="card-content">
                                <h3 class="mb-0">{{ $cat->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-center text-muted py-4 mb-0">{{ __('No products in this catalog yet.') }}</p>
    @elseif ($products->isEmpty())
        <p class="text-center text-muted py-5 mb-0">{{ __('No products to show yet.') }}</p>
    @else
        <div class="isotope-layout" data-default-filter="*" data-layout="fitRows" data-sort="original-order">
            @if ($categories->isNotEmpty())
                <div class="product-category-cards row g-3 g-md-4 mb-4 mb-lg-5">
                    @foreach ($categories as $cat)
                        @php
                            $catImg = $cat->imageUrl() ?? $fallbackImg;
                            $filterSel = '.'.$cat->isotopeFilterClass();
                        @endphp
                        <div class="col-6 col-md-4 col-lg-3">
                            <button
                                type="button"
                                class="product-category-card project-card w-100 border-0 bg-transparent p-0 text-start"
                                data-isotope-filter="{{ $filterSel }}"
                            >
                                <img src="{{ $catImg }}" alt="{{ $cat->name }}" class="img-fluid" loading="lazy" width="600" height="450">
                                <div class="card-overlay">
                                    <div class="card-content">
                                        <h3 class="mb-0">{{ $cat->name }}</h3>
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif

            <ul class="portfolio-filters isotope-filters aos-init" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">{{ __('All Products') }}</li>
                @foreach ($categories as $cat)
                    <li data-filter=".{{ $cat->isotopeFilterClass() }}">{{ $cat->name }}</li>
                @endforeach
            </ul>

            <div class="row g-4 isotope-container aos-init" data-aos="fade-up" data-aos-delay="200">
                @foreach ($products as $product)
                    @php
                        $img = $product->imageUrl() ?? $fallbackImg;
                    @endphp
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $product->isotopeFilterClass() }}">
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
                                    <a href="#product-catalog" class="card-action" title="{{ __('Categories') }}"><i class="bi bi-grid-3x3-gap"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

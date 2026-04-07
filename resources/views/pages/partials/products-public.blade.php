<section id="products" class="projects section" data-builder="section">
    @if ($page && filled($page->body))
        <section class="page-title section">
            <div class="container">
                <h1>{{ $page->title }}</h1>
                @if (filled($page->subtitle))
                    <p class="lead text-muted mb-0">{{ $page->subtitle }}</p>
                @endif
            </div>
        </section>
        <div class="page-custom-body container pb-4">
            {!! $page->body !!}
        </div>
    @else
        <div class="container section-title aos-init" data-aos="fade-up">
            <h2>{{ $page->title ?? __('Our Products') }}</h2>
            <p>{{ $page->subtitle ?? __('Explore our portfolio of work across sectors.') }}</p>
        </div>

        <x-site.products-catalog :categories="$siteProductCategories ?? collect()" :products="$products ?? collect()" />
    @endif
</section>

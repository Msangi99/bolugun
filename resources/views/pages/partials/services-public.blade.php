<section id="services" class="services section services-page-dynamic" data-colorpreset="cp-light-background">
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
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $page->title ?? __('Our Services') }}</h2>
            <p>{{ $page->subtitle ?? __('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur') }}</p>
        </div>
    @endif

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 align-items-stretch">
            @forelse ($services as $index => $service)
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ min(100 + $index * 50, 500) }}">
                    <div class="service-item h-100">
                        @if ($url = $service->imageUrl())
                            <div class="service-thumb">
                                <img src="{{ $url }}" alt="{{ $service->title }}" loading="lazy" width="112" height="112">
                            </div>
                        @else
                            <div class="service-icon">
                                <i class="bi bi-image" aria-hidden="true"></i>
                            </div>
                        @endif
                        <div class="service-body">
                            <h4>{{ $service->title }}</h4>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted py-5 mb-0">{{ __('No services have been added yet.') }}</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

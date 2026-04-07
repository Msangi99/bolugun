@php
    $aboutHeadline = $page->title ?? __('We Build With Precision, Passion & Purpose');
    $aboutLead = $page->subtitle ?? __('Since 1998, we have been delivering world-class construction services across residential, commercial, and infrastructure sectors. Our commitment to quality craftsmanship and client satisfaction drives everything we do.');
    $highlightIcons = ['shield-check', 'clock-history', 'people', 'trophy'];
@endphp

<section id="about" class="about section about-page" data-builder="section">
    @if ($page && filled($page->body))
        <div class="container pt-4">
            <div class="page-custom-body pb-2">
                {!! $page->body !!}
            </div>
        </div>
    @endif

    <div class="container aos-init" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 align-items-center">
            <div class="col-lg-6 aos-init" data-aos="fade-right" data-aos-delay="200">
                <div class="about-gallery">
                    <div class="gallery-main">
                        <img src="https://builder.bootstrapmade.com/static/img/construction/showcase-4.webp" alt="" class="img-fluid" loading="lazy" width="600" height="800">
                    </div>
                    <div class="gallery-secondary">
                        <img src="https://builder.bootstrapmade.com/static/img/construction/showcase-8.webp" alt="" class="img-fluid" loading="lazy" width="400" height="300">
                    </div>
                    <div class="experience-badge">
                        <span class="number">25+</span>
                        <span class="text">{!! __('Years of<br>Experience') !!}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 aos-init" data-aos="fade-left" data-aos-delay="300">
                <div class="about-content">
                    <span class="section-label"><i class="bi bi-building"></i> {{ __('About') }} {{ config('app.name') }}</span>
                    <h2>{{ $aboutHeadline }}</h2>
                    <p class="lead">{{ $aboutLead }}</p>

                    <div class="about-highlights">
                        <div class="row g-4">
                            @forelse ($items as $index => $item)
                                @php
                                    $icon = $highlightIcons[$index % count($highlightIcons)];
                                @endphp
                                <div class="col-sm-6">
                                    <div class="highlight-item">
                                        <div class="highlight-icon">
                                            @if ($url = $item->imageUrl())
                                                <img src="{{ $url }}" alt="" loading="lazy" width="44" height="44">
                                            @else
                                                <i class="bi bi-{{ $icon }}"></i>
                                            @endif
                                        </div>
                                        <h4>{{ $item->title }}</h4>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="col-sm-6">
                                    <div class="highlight-item">
                                        <div class="highlight-icon"><i class="bi bi-shield-check"></i></div>
                                        <h4>{{ __('Licensed & Insured') }}</h4>
                                        <p>{{ __('Fully certified with comprehensive coverage for every project we undertake.') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="highlight-item">
                                        <div class="highlight-icon"><i class="bi bi-clock-history"></i></div>
                                        <h4>{{ __('On-Time Delivery') }}</h4>
                                        <p>{{ __('Proven track record of completing projects within schedule and budget.') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="highlight-item">
                                        <div class="highlight-icon"><i class="bi bi-people"></i></div>
                                        <h4>{{ __('Expert Workforce') }}</h4>
                                        <p>{{ __('Over 120 skilled professionals across all construction disciplines.') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="highlight-item">
                                        <div class="highlight-icon"><i class="bi bi-trophy"></i></div>
                                        <h4>{{ __('Award Winning') }}</h4>
                                        <p>{{ __('Recognized with 35+ industry awards for quality and innovation.') }}</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="about-cta">
                        <a href="{{ route('pages.show', 'contact') }}" class="btn-about">{{ __('Start Your Project') }} <i class="bi bi-arrow-right"></i></a>
                        <a href="{{ route('pages.show', 'products') }}" class="btn-about-outline">{{ __('View Our Work') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

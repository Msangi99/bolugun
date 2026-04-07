<section id="contact" class="contact section contact-page" data-builder="section" data-colorpreset="cp-light-background">
    @if ($page && filled($page->body))
        <div class="container pt-4">
            <div class="page-custom-body pb-2">
                {!! $page->body !!}
            </div>
        </div>
    @endif

    <div class="container section-title aos-init" data-aos="fade-up" data-builder="section-title">
        <h2>{{ $page->title ?? __('Get In Touch') }}</h2>
        <p>{{ $page->subtitle ?? __('Visit us in Gerezani, Dar es Salaam, or send a message — we supply hardware and building materials for your projects.') }}</p>
    </div>

    <div class="container aos-init" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="info-cards">
                    @forelse ($items as $index => $item)
                        <div class="info-card d-flex align-items-start gap-3 aos-init" data-aos="fade-up" data-aos-delay="{{ min(100 + $index * 100, 400) }}">
                            <div class="icon-box">
                                @if ($url = $item->imageUrl())
                                    <img src="{{ $url }}" alt="" loading="lazy" width="48" height="48">
                                @else
                                    <i class="bi bi-{{ $item->icon_class }}"></i>
                                @endif
                            </div>
                            <div>
                                <h4>{{ $item->title }}</h4>
                                <p>{!! nl2br(e($item->body)) !!}</p>
                            </div>
                        </div>
                    @empty
                        @include('components.home.contact-cards-only')
                    @endforelse
                </div>
            </div>
            <div class="col-lg-8 aos-init" data-aos="fade-up" data-aos-delay="200">
                @include('pages.partials.contact-form')
            </div>
        </div>
    </div>

    <div class="container aos-init mt-5 pt-lg-2" data-aos="fade-up" data-aos-delay="150">
        <div class="section-title text-center mb-4">
            <h3 class="h4 mb-2">{{ __('Find us on the map') }}</h3>
            <p class="mb-0 text-secondary">{{ __('Masjid Mtoro, Kariakoo area — Dar es Salaam') }}</p>
        </div>
        <div class="contact-page-map ratio ratio-4x3 rounded overflow-hidden shadow-sm mx-auto" style="max-width: 960px;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2355.5569631762455!2d39.27638433942364!3d-6.823387561212516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4ba845b67b3b%3A0x11f83d536cd58d5a!2sMasjid%20Mtoro%2C%20Kariakoo!5e0!3m2!1sen!2stz!4v1775587006688!5m2!1sen!2stz"
                class="border-0"
                style="width: 100%; height: 100%;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="{{ __('Business location map') }}"
            ></iframe>
        </div>
    </div>
</section>

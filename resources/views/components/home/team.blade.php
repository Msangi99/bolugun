@props([
    'members' => collect(),
])

@php
    $fallbackImg = 'https://builder.bootstrapmade.com/static/img/construction/team-2.webp';
@endphp

<section id="team" class="team section" data-builder="section">
    <div class="container section-title aos-init" data-aos="fade-up" data-builder="section-title">
        <h2>{{ __('Our Team') }}</h2>
        <p>{{ __('Meet the people behind every successful build.') }}</p>
    </div>

    <div class="container aos-init" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            @foreach ($members as $index => $member)
                @php
                    $img = $member->imageUrl() ?? $fallbackImg;
                    $delay = 100 + ($index * 100);
                @endphp
                <div class="col-lg-3 col-md-6 aos-init" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    <div class="member-card">
                        <div class="member-img">
                            <img src="{{ $img }}" alt="{{ $member->name }}" class="img-fluid" loading="lazy" width="400" height="500">
                            @if (filled($member->twitter_url) || filled($member->facebook_url) || filled($member->linkedin_url))
                                <div class="social-links">
                                    @if (filled($member->twitter_url))
                                        <a href="{{ $member->twitter_url }}" target="_blank" rel="noopener noreferrer" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                                    @endif
                                    @if (filled($member->facebook_url))
                                        <a href="{{ $member->facebook_url }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                                    @endif
                                    @if (filled($member->linkedin_url))
                                        <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="member-info">
                            <h4>{{ $member->name }}</h4>
                            <span>{{ $member->role }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

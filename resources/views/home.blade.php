@extends('layouts.site')

@section('title', config('app.name'))

@section('content')
    <x-home.header />
    <main class="main" id="page-home">
        <x-home.hero />
        <x-home.stats />
        <x-home.process />
        @if (isset($siteTeamMembers) && $siteTeamMembers->isNotEmpty())
            <x-home.team :members="$siteTeamMembers" />
        @endif
        <x-home.testimonials />
        <x-home.faq />
        @if (isset($siteProducts) && ($siteProducts->isNotEmpty() || (isset($siteProductCategories) && $siteProductCategories->isNotEmpty())))
            <section id="products" class="projects section" data-builder="section">
                <div class="container section-title aos-init" data-aos="fade-up">
                    <h2>{{ __('Our Products') }}</h2>
                    <p>{{ __('Browse by category, then explore each project.') }}</p>
                </div>
                <x-site.products-catalog :categories="$siteProductCategories ?? collect()" :products="$siteProducts ?? collect()" />
            </section>
        @endif
        <x-home.call-to-action />
    </main>
    <x-home.footer />
    <x-home.scroll-top />
@endsection

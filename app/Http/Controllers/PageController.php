<?php

namespace App\Http\Controllers;

use App\Models\SiteAboutItem;
use App\Models\SiteContactItem;
use App\Models\SitePage;
use App\Models\SiteProduct;
use App\Models\SiteProductCategory;
use App\Models\SiteService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(string $slug): View
    {
        abort_unless(in_array($slug, SitePage::allowedSlugs(), true), 404);

        $page = SitePage::query()->where('slug', $slug)->first();

        $siteServices = $slug === 'services'
            ? SiteService::query()->orderBy('sort_order')->orderBy('id')->get()
            : collect();

        $aboutItems = $slug === 'about'
            ? SiteAboutItem::query()->orderBy('sort_order')->orderBy('id')->get()
            : collect();

        $contactItems = $slug === 'contact'
            ? SiteContactItem::query()->orderBy('sort_order')->orderBy('id')->get()
            : collect();

        $siteProducts = $slug === 'products'
            ? SiteProduct::query()->with('category')->orderBy('sort_order')->orderBy('id')->get()
            : collect();

        $siteProductCategories = $slug === 'products'
            ? SiteProductCategory::query()->orderBy('sort_order')->orderBy('id')->get()
            : collect();

        return view('pages.show', [
            'slug' => $slug,
            'page' => $page,
            'siteServices' => $siteServices,
            'aboutItems' => $aboutItems,
            'contactItems' => $contactItems,
            'siteProducts' => $siteProducts,
            'siteProductCategories' => $siteProductCategories,
        ]);
    }
}

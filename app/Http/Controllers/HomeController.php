<?php

namespace App\Http\Controllers;

use App\Models\SiteProduct;
use App\Models\SiteProductCategory;
use App\Models\SiteTeamMember;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $siteProductCategories = SiteProductCategory::query()->orderBy('sort_order')->orderBy('id')->get();
        $siteProducts = SiteProduct::query()->with('category')->orderBy('sort_order')->orderBy('id')->get();
        $siteTeamMembers = SiteTeamMember::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('home', [
            'siteProductCategories' => $siteProductCategories,
            'siteProducts' => $siteProducts,
            'siteTeamMembers' => $siteTeamMembers,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SitePage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SitePageController extends Controller
{
    public function index(): View
    {
        $pages = SitePage::query()
            ->whereIn('slug', SitePage::allowedSlugs())
            ->orderByRaw("CASE slug WHEN 'about' THEN 1 WHEN 'services' THEN 2 WHEN 'products' THEN 3 WHEN 'contact' THEN 4 ELSE 5 END")
            ->get();

        return view('admin.site-pages.index', compact('pages'));
    }

    public function edit(SitePage $sitePage): View
    {
        abort_unless(in_array($sitePage->slug, SitePage::allowedSlugs(), true), 404);

        return view('admin.site-pages.edit', ['page' => $sitePage]);
    }

    public function update(Request $request, SitePage $sitePage): RedirectResponse
    {
        abort_unless(in_array($sitePage->slug, SitePage::allowedSlugs(), true), 404);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
        ]);

        $body = $validated['body'] ?? null;
        if ($body !== null && trim($body) === '') {
            $body = null;
        }

        $sitePage->update([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'body' => $body,
        ]);

        return redirect()
            ->route('admin.site-pages.edit', $sitePage)
            ->with('status', __('Page updated.'));
    }
}

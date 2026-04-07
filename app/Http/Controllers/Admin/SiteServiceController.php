<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SiteServiceController extends Controller
{
    public function index(): View
    {
        $services = SiteService::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.site-services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.site-services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png,webp,gif'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
        }

        SiteService::query()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_path' => $path,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('status', __('Service created.'));
    }

    public function edit(SiteService $service): View
    {
        return view('admin.site-services.edit', ['service' => $service]);
    }

    public function update(Request $request, SiteService $service): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png,webp,gif'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'sort_order' => $validated['sort_order'] ?? $service->sort_order,
        ];

        if ($request->hasFile('image')) {
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }
            $data['image_path'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()
            ->route('admin.services.edit', $service)
            ->with('status', __('Service updated.'));
    }

    public function destroy(SiteService $service): RedirectResponse
    {
        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('status', __('Service removed.'));
    }
}

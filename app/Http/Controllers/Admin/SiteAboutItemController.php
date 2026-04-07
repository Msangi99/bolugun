<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteAboutItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SiteAboutItemController extends Controller
{
    public function index(): View
    {
        $items = SiteAboutItem::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.site-about-items.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.site-about-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);
        $path = $this->storeUploadedImage($request, 'about');

        SiteAboutItem::query()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_path' => $path,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.about-items.index')->with('status', __('Item created.'));
    }

    public function edit(SiteAboutItem $about_item): View
    {
        return view('admin.site-about-items.edit', ['item' => $about_item]);
    }

    public function update(Request $request, SiteAboutItem $about_item): RedirectResponse
    {
        $validated = $this->validated($request);
        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'sort_order' => $validated['sort_order'] ?? $about_item->sort_order,
        ];

        if ($request->hasFile('image')) {
            if ($about_item->image_path && ! str_starts_with((string) $about_item->image_path, 'http')) {
                Storage::disk('public')->delete($about_item->image_path);
            }
            $data['image_path'] = $request->file('image')->store('about', 'public');
        }

        $about_item->update($data);

        return redirect()->route('admin.about-items.edit', $about_item)->with('status', __('Item updated.'));
    }

    public function destroy(SiteAboutItem $about_item): RedirectResponse
    {
        if ($about_item->image_path && ! str_starts_with((string) $about_item->image_path, 'http')) {
            Storage::disk('public')->delete($about_item->image_path);
        }
        $about_item->delete();

        return redirect()->route('admin.about-items.index')->with('status', __('Item removed.'));
    }

    /**
     * @return array{title: string, description: string, sort_order: int|null}
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png,webp,gif'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);
    }

    private function storeUploadedImage(Request $request, string $folder): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        return $request->file('image')->store($folder, 'public');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContactItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SiteContactItemController extends Controller
{
    public function index(): View
    {
        $items = SiteContactItem::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.site-contact-items.index', compact('items'));
    }

    public function create(): View
    {
        return view('admin.site-contact-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'icon_class' => ['nullable', 'string', 'max:64', 'regex:/^[a-z0-9-]+$/'],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png,webp,gif'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('contact', 'public');
        }

        $icon = trim((string) ($validated['icon_class'] ?? ''));
        if ($icon === '') {
            $icon = 'info-circle';
        }

        SiteContactItem::query()->create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'icon_class' => $icon,
            'image_path' => $path,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.contact-items.index')->with('status', __('Item created.'));
    }

    public function edit(SiteContactItem $contact_item): View
    {
        return view('admin.site-contact-items.edit', ['item' => $contact_item]);
    }

    public function update(Request $request, SiteContactItem $contact_item): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'icon_class' => ['nullable', 'string', 'max:64', 'regex:/^[a-z0-9-]+$/'],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png,webp,gif'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        $icon = $contact_item->icon_class;
        if ($request->filled('icon_class')) {
            $trimmed = trim((string) $validated['icon_class']);
            $icon = $trimmed === '' ? 'info-circle' : $trimmed;
        }

        $data = [
            'title' => $validated['title'],
            'body' => $validated['body'],
            'icon_class' => $icon,
            'sort_order' => $validated['sort_order'] ?? $contact_item->sort_order,
        ];

        if ($request->hasFile('image')) {
            if ($contact_item->image_path && ! str_starts_with((string) $contact_item->image_path, 'http')) {
                Storage::disk('public')->delete($contact_item->image_path);
            }
            $data['image_path'] = $request->file('image')->store('contact', 'public');
        }

        $contact_item->update($data);

        return redirect()->route('admin.contact-items.edit', $contact_item)->with('status', __('Item updated.'));
    }

    public function destroy(SiteContactItem $contact_item): RedirectResponse
    {
        if ($contact_item->image_path && ! str_starts_with((string) $contact_item->image_path, 'http')) {
            Storage::disk('public')->delete($contact_item->image_path);
        }
        $contact_item->delete();

        return redirect()->route('admin.contact-items.index')->with('status', __('Item removed.'));
    }
}

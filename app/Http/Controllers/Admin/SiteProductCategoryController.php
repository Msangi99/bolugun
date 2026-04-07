<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SiteProductCategoryController extends Controller
{
    public function index(): View
    {
        $categories = SiteProductCategory::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.site-product-categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.site-product-categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product-categories', 'public');
        }

        SiteProductCategory::query()->create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'image_path' => $path,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.product-categories.index')->with('status', __('Category created.'));
    }

    public function edit(SiteProductCategory $product_category): View
    {
        return view('admin.site-product-categories.edit', ['category' => $product_category]);
    }

    public function update(Request $request, SiteProductCategory $product_category): RedirectResponse
    {
        $validated = $this->validated($request, $product_category);

        $data = [
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'sort_order' => $validated['sort_order'] ?? $product_category->sort_order,
        ];

        if ($request->hasFile('image')) {
            if ($product_category->image_path && ! str_starts_with((string) $product_category->image_path, 'http')) {
                Storage::disk('public')->delete($product_category->image_path);
            }
            $data['image_path'] = $request->file('image')->store('product-categories', 'public');
        }

        $product_category->update($data);

        return redirect()->route('admin.product-categories.edit', $product_category)->with('status', __('Category updated.'));
    }

    public function destroy(SiteProductCategory $product_category): RedirectResponse
    {
        if ($product_category->products()->exists()) {
            return redirect()->route('admin.product-categories.index')->with('status', __('This category cannot be deleted while products are assigned to it.'));
        }

        if ($product_category->image_path && ! str_starts_with((string) $product_category->image_path, 'http')) {
            Storage::disk('public')->delete($product_category->image_path);
        }
        $product_category->delete();

        return redirect()->route('admin.product-categories.index')->with('status', __('Category removed.'));
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request, ?SiteProductCategory $existing = null): array
    {
        $slugRule = Rule::unique('site_product_categories', 'slug');
        if ($existing) {
            $slugRule->ignore($existing->id);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slugRule],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png,webp,gif'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        if ($validated['slug'] === '') {
            $validated['slug'] = 'category-'.Str::random(8);
        }

        return $validated;
    }
}

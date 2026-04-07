<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteProduct;
use App\Models\SiteProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SiteProductController extends Controller
{
    public function index(): View
    {
        $products = SiteProduct::query()->with('category')->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.site-products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.site-products.create', [
            'categories' => SiteProductCategory::query()->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tag' => ['required', 'string', 'max:100'],
            'site_product_category_id' => ['required', 'exists:site_product_categories,id'],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png,webp,gif'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
        }

        SiteProduct::query()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'tag' => $validated['tag'],
            'site_product_category_id' => (int) $validated['site_product_category_id'],
            'image_path' => $path,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.products.index')->with('status', __('Product created.'));
    }

    public function edit(SiteProduct $product): View
    {
        return view('admin.site-products.edit', [
            'product' => $product,
            'categories' => SiteProductCategory::query()->orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function update(Request $request, SiteProduct $product): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tag' => ['required', 'string', 'max:100'],
            'site_product_category_id' => ['required', 'exists:site_product_categories,id'],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png,webp,gif'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:65535'],
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'tag' => $validated['tag'],
            'site_product_category_id' => (int) $validated['site_product_category_id'],
            'sort_order' => $validated['sort_order'] ?? $product->sort_order,
        ];

        if ($request->hasFile('image')) {
            if ($product->image_path && ! str_starts_with((string) $product->image_path, 'http')) {
                Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.edit', $product)->with('status', __('Product updated.'));
    }

    public function destroy(SiteProduct $product): RedirectResponse
    {
        if ($product->image_path && ! str_starts_with((string) $product->image_path, 'http')) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('status', __('Product removed.'));
    }
}

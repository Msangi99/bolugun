<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('site_products', 'site_product_category_id')) {
            Schema::table('site_products', function (Blueprint $table) {
                $table->foreignId('site_product_category_id')->nullable()->after('id')->constrained('site_product_categories')->restrictOnDelete();
            });
        }

        if (! Schema::hasColumn('site_products', 'category')) {
            return;
        }

        $defaults = [
            'residential' => ['name' => 'Residential', 'slug' => 'residential', 'sort_order' => 10],
            'commercial' => ['name' => 'Commercial', 'slug' => 'commercial', 'sort_order' => 20],
            'infrastructure' => ['name' => 'Infrastructure', 'slug' => 'infrastructure', 'sort_order' => 30],
            'other' => ['name' => 'Other', 'slug' => 'other', 'sort_order' => 40],
        ];

        $ids = [];
        foreach ($defaults as $key => $meta) {
            $existing = DB::table('site_product_categories')->where('slug', $meta['slug'])->first();
            if ($existing) {
                $ids[$key] = $existing->id;
            } else {
                $ids[$key] = DB::table('site_product_categories')->insertGetId(array_merge($meta, [
                    'image_path' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
        }

        foreach ($ids as $oldKey => $categoryId) {
            DB::table('site_products')->where('category', $oldKey)->update(['site_product_category_id' => $categoryId]);
        }

        DB::table('site_products')->whereNull('site_product_category_id')->update(['site_product_category_id' => $ids['other']]);

        Schema::table('site_products', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }

    public function down(): void
    {
        Schema::table('site_products', function (Blueprint $table) {
            $table->string('category', 32)->default('other')->after('tag');
        });

        $slugToOld = [
            'residential' => 'residential',
            'commercial' => 'commercial',
            'infrastructure' => 'infrastructure',
            'other' => 'other',
        ];

        $categories = DB::table('site_product_categories')->get();
        foreach ($categories as $cat) {
            $old = $slugToOld[$cat->slug] ?? 'other';
            DB::table('site_products')
                ->where('site_product_category_id', $cat->id)
                ->update(['category' => $old]);
        }

        Schema::table('site_products', function (Blueprint $table) {
            $table->dropForeign(['site_product_category_id']);
            $table->dropColumn('site_product_category_id');
        });
    }
};

<?php

namespace Database\Seeders;

use App\Models\SiteProduct;
use App\Models\SiteProductCategory;
use Illuminate\Database\Seeder;

class SiteProductSeeder extends Seeder
{
    public function run(): void
    {
        $residential = SiteProductCategory::query()->firstOrCreate(
            ['slug' => 'residential'],
            ['name' => 'Residential', 'sort_order' => 10, 'image_path' => null],
        );
        $commercial = SiteProductCategory::query()->firstOrCreate(
            ['slug' => 'commercial'],
            ['name' => 'Commercial', 'sort_order' => 20, 'image_path' => null],
        );
        $infrastructure = SiteProductCategory::query()->firstOrCreate(
            ['slug' => 'infrastructure'],
            ['name' => 'Infrastructure', 'sort_order' => 30, 'image_path' => null],
        );

        $rows = [
            ['title' => 'Sunset Ridge Villa', 'description' => 'Premium residential complex with contemporary architecture', 'tag' => 'Residential', 'site_product_category_id' => $residential->id, 'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/project-1.webp', 'sort_order' => 10],
            ['title' => 'Metro Business Hub', 'description' => 'State-of-the-art office complex in the city center', 'tag' => 'Commercial', 'site_product_category_id' => $commercial->id, 'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/project-3.webp', 'sort_order' => 20],
            ['title' => 'Riverside Highway Bridge', 'description' => 'Major bridge connecting the northern corridor', 'tag' => 'Infrastructure', 'site_product_category_id' => $infrastructure->id, 'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/project-6.webp', 'sort_order' => 30],
            ['title' => 'Lakeview Apartments', 'description' => 'Modern lakeside living with panoramic views', 'tag' => 'Residential', 'site_product_category_id' => $residential->id, 'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/project-9.webp', 'sort_order' => 40],
            ['title' => 'Central Shopping Plaza', 'description' => 'Multi-level retail destination with modern amenities', 'tag' => 'Commercial', 'site_product_category_id' => $commercial->id, 'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/project-10.webp', 'sort_order' => 50],
            ['title' => 'Northern Rail Terminal', 'description' => 'Multi-modal transportation hub for the metro area', 'tag' => 'Infrastructure', 'site_product_category_id' => $infrastructure->id, 'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/project-12.webp', 'sort_order' => 60],
        ];

        foreach ($rows as $row) {
            SiteProduct::query()->updateOrCreate(
                ['title' => $row['title']],
                $row,
            );
        }
    }
}

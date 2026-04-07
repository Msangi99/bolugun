<?php

namespace Database\Seeders;

use App\Models\SiteAboutItem;
use Illuminate\Database\Seeder;

class SiteAboutItemSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['title' => 'Licensed & Insured', 'description' => 'Fully certified with comprehensive coverage for every project we undertake.', 'sort_order' => 10],
            ['title' => 'On-Time Delivery', 'description' => 'Proven track record of completing projects within schedule and budget.', 'sort_order' => 20],
            ['title' => 'Expert Workforce', 'description' => 'Over 120 skilled professionals across all construction disciplines.', 'sort_order' => 30],
            ['title' => 'Award Winning', 'description' => 'Recognized with 35+ industry awards for quality and innovation.', 'sort_order' => 40],
        ];

        foreach ($rows as $row) {
            SiteAboutItem::query()->updateOrCreate(
                ['title' => $row['title']],
                [
                    'description' => $row['description'],
                    'sort_order' => $row['sort_order'],
                    'image_path' => null,
                ],
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\SiteContactItem;
use Illuminate\Database\Seeder;

class SiteContactItemSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'title' => 'Our Office',
                'body' => "742 Evergreen Terrace\nSpringfield, IL 62701",
                'icon_class' => 'geo-alt',
                'sort_order' => 10,
            ],
            [
                'title' => 'Call Us',
                'body' => "+1 (555) 123-4567\n+1 (555) 987-6543",
                'icon_class' => 'telephone',
                'sort_order' => 20,
            ],
            [
                'title' => 'Email Us',
                'body' => "contact@example.com\nprojects@example.com",
                'icon_class' => 'envelope',
                'sort_order' => 30,
            ],
            [
                'title' => 'Working Hours',
                'body' => "Mon - Fri: 8:00 AM - 6:00 PM\nSat: 9:00 AM - 1:00 PM",
                'icon_class' => 'clock',
                'sort_order' => 40,
            ],
        ];

        foreach ($rows as $row) {
            SiteContactItem::query()->updateOrCreate(
                ['title' => $row['title']],
                array_merge($row, ['image_path' => null]),
            );
        }
    }
}

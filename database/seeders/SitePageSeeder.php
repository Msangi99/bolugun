<?php

namespace Database\Seeders;

use App\Models\SitePage;
use Illuminate\Database\Seeder;

class SitePageSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'about' => [
                'title' => 'We Build With Precision, Passion & Purpose',
                'subtitle' => 'Since 1998, we have been delivering world-class construction services across residential, commercial, and infrastructure sectors. Our commitment to quality craftsmanship and client satisfaction drives everything we do.',
            ],
            'services' => [
                'title' => 'Services',
                'subtitle' => 'What we offer for your construction needs.',
            ],
            'products' => [
                'title' => 'Products',
                'subtitle' => 'A selection of our recent work.',
            ],
            'contact' => [
                'title' => 'Get In Touch',
                'subtitle' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore',
            ],
        ];

        foreach ($defaults as $slug => $meta) {
            SitePage::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $meta['title'],
                    'subtitle' => $meta['subtitle'],
                    'body' => null,
                ],
            );
        }
    }
}

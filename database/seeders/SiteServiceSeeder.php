<?php

namespace Database\Seeders;

use App\Models\SiteService;
use Illuminate\Database\Seeder;

class SiteServiceSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['title' => 'Residential Building', 'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit.', 'sort_order' => 10],
            ['title' => 'Commercial Projects', 'description' => 'Ut enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit laboriosam.', 'sort_order' => 20],
            ['title' => 'Renovation & Remodeling', 'description' => 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae.', 'sort_order' => 30],
            ['title' => 'Road & Infrastructure', 'description' => 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet.', 'sort_order' => 40],
            ['title' => 'Project Management', 'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia.', 'sort_order' => 50],
            ['title' => 'Architecture & Design', 'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.', 'sort_order' => 60],
        ];

        foreach ($rows as $row) {
            SiteService::query()->updateOrCreate(
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

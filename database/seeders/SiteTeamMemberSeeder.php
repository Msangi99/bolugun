<?php

namespace Database\Seeders;

use App\Models\SiteTeamMember;
use Illuminate\Database\Seeder;

class SiteTeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'name' => 'Robert Anderson',
                'role' => 'Chief Executive Officer',
                'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/team-2.webp',
                'twitter_url' => null,
                'facebook_url' => null,
                'linkedin_url' => null,
                'sort_order' => 10,
            ],
            [
                'name' => 'Sarah Mitchell',
                'role' => 'Lead Architect',
                'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/team-5.webp',
                'twitter_url' => null,
                'facebook_url' => null,
                'linkedin_url' => null,
                'sort_order' => 20,
            ],
            [
                'name' => 'David Thompson',
                'role' => 'Project Manager',
                'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/team-7.webp',
                'twitter_url' => null,
                'facebook_url' => null,
                'linkedin_url' => null,
                'sort_order' => 30,
            ],
            [
                'name' => 'Emily Carter',
                'role' => 'Site Supervisor',
                'image_path' => 'https://builder.bootstrapmade.com/static/img/construction/team-9.webp',
                'twitter_url' => null,
                'facebook_url' => null,
                'linkedin_url' => null,
                'sort_order' => 40,
            ],
        ];

        foreach ($rows as $row) {
            SiteTeamMember::query()->updateOrCreate(
                ['name' => $row['name']],
                $row,
            );
        }
    }
}

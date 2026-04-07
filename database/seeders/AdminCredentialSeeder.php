<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminCredentialSeeder extends Seeder
{
    /**
     * Seed the default admin user (email + password from env).
     */
    public function run(): void
    {
        $adminRole = Role::query()->firstOrCreate(
            ['name' => 'admin'],
            [
                'description' => 'Full administrative access.',
                'permissions' => null,
            ],
        );

        $email = (string) config('admin.email');
        $password = (string) config('admin.password');

        User::query()->updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Administrator',
                'password' => $password,
                'role_id' => $adminRole->id,
                'email_verified_at' => now(),
            ],
        );
    }
}

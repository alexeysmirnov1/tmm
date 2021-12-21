<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Moderator;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        if(! Admin::whereEmail('admin@flagstudio.ru')->exists()) {
            Admin::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@flagstudio.ru',
                'password' => bcrypt('secret'), // secret
                'email_verified_at' => now(),
            ]);
        }

        if(! Moderator::whereEmail('moderator@flagstudio.ru')->exists()) {
            Moderator::factory()->create([
                'name' => 'Moderator',
                'email' => 'moderator@flagstudio.ru',
                'password' => bcrypt('secret'), // secret
                'email_verified_at' => now(),
            ]);
        }
    }
}

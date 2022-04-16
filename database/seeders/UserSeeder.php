<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Moderator;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws \Exception
     *
     * @return void
     */
    public function run()
    {
        if(! Admin::whereEmail('admin@flagstudio.ru')->exists()) {
            Admin::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@flagstudio.ru',
                'password' => bcrypt('admin'), // secret
                'email_verified_at' => now(),
            ]);
        }

        if(! Moderator::whereEmail('moderator@flagstudio.ru')->exists()) {
            Moderator::factory()->create([
                'name' => 'Moderator',
                'email' => 'moderator@flagstudio.ru',
                'password' => bcrypt('admin'), // secret
                'email_verified_at' => now(),
            ]);
        }
    }
}

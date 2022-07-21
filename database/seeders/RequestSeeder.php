<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    public function run(): void
    {
        Request::factory()
            ->canceled()
            ->count(15)
            ->create();

        Request::factory()
            ->moderation()
            ->count(7)
            ->create();

        Request::factory()
            ->approved()
            ->count(4)
            ->create();
    }
}

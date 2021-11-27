<?php

namespace Tests\Feature\Repositories\DebitRepository;

use App\Models\Debit;
use App\Repositories\DebitRepository;
use App\Values\Id;
use Tests\TestCase;

class FindTest extends TestCase
{
    public function test_debit_exists()
    {
        Debit::factory()->create();

        $repository = resolve(DebitRepository::class);
        $repository->find(new Id(1));
    }

    public function test_debit_not_exists()
    {

    }
}

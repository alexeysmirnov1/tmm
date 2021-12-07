<?php

namespace Tests\Feature\Repositories\DebitRepository;

use App\Exceptions\Order\DebitNotFound;
use App\Models\Debit;
use App\Repositories\DebitRepository;
use App\Values\Id;
use App\Values\Title;
use Tests\TestCase;

class FindTest extends TestCase
{
    public function test_debit_exists()
    {
        $debitModel = Debit::factory()->create([
            'title' => 'test debit title'
        ]);

        $repository = resolve(DebitRepository::class);
        $debit = $repository->find(new Id($debitModel->id));

        $this->assertEquals(new Id($debitModel->id), $debit->getId());
        $this->assertEquals(new Title('test debit title'), $debit->getTitle());
    }

    public function test_debit_not_exists()
    {
        $this->expectException(DebitNotFound::class);

        $repository = resolve(DebitRepository::class);
        $repository->find(new Id(10));
    }
}

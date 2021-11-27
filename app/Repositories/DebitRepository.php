<?php

namespace App\Repositories;

use App\Aggregates\Debit\Debit;
use App\Models\Debit as DebitModel;
use App\Values\Id;

class DebitRepository
{
    public function find(Id $id): Debit
    {
        $debit = DebitModel::find($id->getValue());
        dd($debit);

        //TODO map DebitModel to DebitAggregate
    }

    public function add(Debit $debit): void
    {
        // TODO: Implement add() method.
    }

    public function update(Debit $debit): void
    {
        // TODO: Implement update() method.
    }

    public function remove(Debit $debit): void
    {
        // TODO: Implement update() method.
    }
}

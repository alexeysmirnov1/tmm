<?php

namespace App\Repositories;

use App\Aggregates\Debit\Debit;
use App\Models\Debit as DebitModel;
use App\Values\DateTime;
use App\Values\Id;
use App\Values\Status;
use App\Values\Text;
use App\Values\Title;
use Carbon\Carbon;

class DebitRepository
{
    public function find(Id $id): Debit
    {
        $debit = DebitModel::with('user')
            ->find($id->getValue());
//        dd($debit);

        $debit = new Debit(
            id: new Id($debit->id),
            title: new Title($debit->title),
            description: new Text($debit->description),
            dateTime: new DateTime(
                $debit->date,
                $debit->date,
            ),
            customer: $customer,
            source: $source,
            status: new Status($debit->status),
        );

        dd($debit);
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

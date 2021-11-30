<?php

namespace App\Builders;

use App\Aggregates\Debit\Debit;
use App\Contracts\EntityBuilderContract;
use App\Models\Debit as DebitModel;
use App\Values\DateTime;
use App\Values\Id;
use App\Values\Status;
use App\Values\Text;
use App\Values\Title;

class DebitBuilder implements EntityBuilderContract
{
    public function debit(DebitModel $debit, $customer, $source)
    {
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
    }
}

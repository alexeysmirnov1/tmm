<?php

namespace App\Repositories;

use App\Aggregates\Debit\Debit;
use App\Builders\DebitBuilder;
use App\Exceptions\Order\DebitNotFound;
use App\Models\Debit as DebitModel;
use App\Values\Id;

class DebitRepository
{
    public function __construct(
        private DebitBuilder $debitBuilder,
    ) {
    }

    public function find(Id $id): Debit
    {
        $debit = DebitModel::with('user')
            ->find($id->getValue());

        if(!$debit) {
            throw new DebitNotFound;
        }

        return $this->debitBuilder
            ->customer($debit->user)
            ->source($debit->source)
            ->debit($debit)
            ->getDebit();
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

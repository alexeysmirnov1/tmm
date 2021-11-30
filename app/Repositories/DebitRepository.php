<?php

namespace App\Repositories;

use App\Aggregates\Customer\Customer;
use App\Aggregates\Debit\Debit;
use App\Aggregates\Source\Source;
use App\Models\Debit as DebitModel;
use App\Values\Birthday;
use App\Values\Color;
use App\Values\DateTime;
use App\Values\Groups;
use App\Values\Id;
use App\Values\Instagram;
use App\Values\Name;
use App\Values\Phone;
use App\Values\Price;
use App\Values\Sex;
use App\Values\Status;
use App\Values\Text;
use App\Values\Title;

class DebitRepository
{
    public function find(Id $id): Debit
    {
        $debit = DebitModel::with('user')
            ->find($id->getValue());

        $user = $debit->user;
        $customer = new Customer(
            id: new Id($user->id),
            name: new Name($user->name),
            phone: new Phone($user->phone ?? ''),
            instagram: new Instagram($user->instagram ?? ''),
            sex: new Sex($user->sex ?? ''),
            birthday: new Birthday($user->birthday ?? ''),
            groups: new Groups([]),
            blacklist: false,
        );

        $source = $debit->source;
        $source = new Source(
            id: new Id($source->id),
            title: new Title($source->title),
            description: new Text($source->description),
            status: new Status($source->status ?? ''),
            color: Color::RED,
            price: new Price($source->price ?? 0),
        );

        return new Debit(
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

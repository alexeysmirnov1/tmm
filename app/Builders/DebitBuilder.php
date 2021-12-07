<?php

namespace App\Builders;

use App\Aggregates\Customer\Customer;
use App\Aggregates\Debit\Debit;
use App\Aggregates\Source\Source;
use App\Contracts\EntityBuilderContract;
use App\Models\Debit as DebitModel;
use App\Models\Source as SourceModel;
use App\Models\User;
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

class DebitBuilder implements EntityBuilderContract
{
    private ?Customer $customer = null;
    private ?Source $source = null;
    private Debit $debit;

    public function customer(User $user): DebitBuilder
    {
        $this->customer = new Customer(
            id: new Id($user->id),
            name: new Name($user->name),
            phone: new Phone($user->phone ?? ''),
            instagram: new Instagram($user->instagram ?? ''),
            sex: new Sex($user->sex ?? ''),
            birthday: new Birthday($user->birthday ?? ''),
            groups: new Groups([]),
            blacklist: false,
        );

        return $this;
    }

    public function source(SourceModel $source): DebitBuilder
    {
        $this->source = new Source(
            id: new Id($source->id),
            title: new Title($source->title),
            description: new Text($source->description),
            status: new Status($source->status ?? ''),
            color: Color::RED,
            price: new Price($source->price ?? 0),
        );

        return $this;
    }

    public function debit(DebitModel $debit): DebitBuilder
    {
        $this->debit = new Debit(
            id: new Id($debit->id),
            title: new Title($debit->title),
            description: new Text($debit->description),
            dateTime: new DateTime(
                $debit->date,
                $debit->date,
            ),
            customer: $this->customer,
            source: $this->source,
            status: new Status($debit->status),
        );

        return $this;
    }

    public function getDebit(): Debit
    {
        return $this->debit;
    }
}

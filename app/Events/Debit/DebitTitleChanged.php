<?php

namespace App\Events\Debit;

use App\Contracts\DomainEventContract;
use App\Values\Id;
use App\Values\Title;

class DebitTitleChanged implements DomainEventContract
{
    public function __construct(
        private Id $id,
        private Title $title,
    ) {
    }
}

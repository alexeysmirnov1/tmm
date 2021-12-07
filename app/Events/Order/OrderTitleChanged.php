<?php

namespace App\Events\Order;

use App\Contracts\DomainEventContract;
use App\Values\Id;
use App\Values\Title;

class OrderTitleChanged implements DomainEventContract
{
    public function __construct(
        private Id $id,
        private Title $title,
    ) {
    }
}

<?php

namespace App\Aggregates;

use App\Contracts\DomainEventContract;

abstract class AbstractAggregateRoot
{
    public function sendEvent(DomainEventContract $event): void
    {

    }
}

<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Price implements ValueObjectContract
{
    public function __construct(
        private int $price
    ) {
    }

    public function getValue(): int
    {
        return $this->price;
    }
}

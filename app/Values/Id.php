<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Id implements ValueObjectContract
{
    public function __construct(
        private int $id
    ) {
    }

    public function getValue(): int
    {
        return $this->id;
    }
}

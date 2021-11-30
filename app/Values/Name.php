<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Name implements ValueObjectContract
{
    public function __construct(
        private string $name
    ) {
    }

    public function getValue(): string
    {
        return $this->name;
    }
}

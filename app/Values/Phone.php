<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Phone implements ValueObjectContract
{
    public function __construct(
        private string $phone
    ) {
    }

    public function getValue(): string
    {
        return $this->phone;
    }
}

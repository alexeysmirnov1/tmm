<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Birthday implements ValueObjectContract
{
    public function __construct(
        private string $birthday
    ) {
    }

    public function getValue(): string
    {
        return $this->birthday;
    }
}

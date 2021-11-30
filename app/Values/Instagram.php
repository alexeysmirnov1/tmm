<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Instagram implements ValueObjectContract
{
    public function __construct(
        private string $instagram
    ) {
    }

    public function getValue(): string
    {
        return $this->instagram;
    }
}

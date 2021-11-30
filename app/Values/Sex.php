<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Sex implements ValueObjectContract
{
    public function __construct(
        private string $sex
    ) {
    }

    public function getValue(): string
    {
        return $this->sex;
    }
}

<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Groups implements ValueObjectContract
{
    public function __construct(
        private array $groups
    ) {
    }

    public function getValue(): array
    {
        return $this->groups;
    }
}

<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Title implements ValueObjectContract
{
    public function __construct(
        private string $title
    ) {
    }

    public function getValue(): string
    {
        return $this->title;
    }
}

<?php

namespace App\Values;

use Illuminate\Support\Str;

class Id
{
    public function __construct(
        private int $id
    ) {
    }

//    public static function next(): self
//    {
//        return new self(Str::uuid()->toString());
//    }

    public function getValue(): int
    {
        return $this->id;
    }
}

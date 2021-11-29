<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;
use Illuminate\Support\Str;

class Text implements ValueObjectContract
{
    private const LENGTH = 255;

    public function __construct(
        private string $text
    ) {
        if(Str::length($text) > self::LENGTH) {
            throw new \LengthException('Text cannot be length more than 255 symbols.');
        }
    }

    public function getValue(): string
    {
        return $this->text;
    }
}

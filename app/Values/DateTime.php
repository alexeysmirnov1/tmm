<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;
use Carbon\Carbon;

class DateTime implements ValueObjectContract
{
    public function __construct(
        private Carbon $date,
        private Carbon $time,
    ) {
    }

    public function getValue(): string
    {
        return $this->date->toDateString() . ' ' . $this->time->toTimeString();
    }
}

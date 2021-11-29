<?php

namespace App\Values;

use App\Contracts\ValueObjectContract;

class Status implements ValueObjectContract
{
    public const CREATED = 'created';
    public const FINISHED = 'finished';
    public const CANCEL = 'cancel';

    public function __construct(
        private string $status,
    ) {
    }

    public function getValue(): string
    {
        return $this->status;
    }
}

<?php

namespace App\DTO;

use App\Values\Id;
use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class CreateDebitData extends DataTransferObject
{
    public string $title;

    public string $description;

    public Carbon $date;

    public Carbon $time;

    public Id $customerId;

    public Id $sourceId;

    public string $status;

    public ?Id $actionId = null;
}

<?php

namespace Tests\Unit\Values;

use App\Values\DateTime;
use Carbon\Carbon;
use Tests\TestCase;

class DateTimeTest extends TestCase
{
    public function test_create()
    {
        $date = new DateTime(
            Carbon::parse('2021-11-29'),
            Carbon::parse('10:11:12')
        );

        $this->assertEquals('2021-11-29 10:11:12', $date->getValue());
    }
}

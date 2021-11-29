<?php

namespace Tests\Unit\Values;

use App\Values\Id;
use Tests\TestCase;

class IdTest extends TestCase
{
    public function test_create()
    {
        $id = new Id(25);

        $this->assertEquals(25, $id->getValue());
    }
}

<?php

namespace Tests\Unit\Values;

use App\Values\Id;
use App\Values\Title;
use Tests\TestCase;

class TitleTest extends TestCase
{
    public function test_create()
    {
        $title = new Title('title');

        $this->assertEquals('title', $title->getValue());
    }
}

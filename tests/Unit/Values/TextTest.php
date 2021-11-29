<?php

namespace Tests\Unit\Values;

use App\Values\Id;
use App\Values\Text;
use App\Values\Title;
use Tests\TestCase;

class TextTest extends TestCase
{
    public function test_created()
    {
        $id = new Text('short text');

        $this->assertEquals('short text', $id->getValue());
    }

    public function test_create_failed()
    {
        $this->expectException(\LengthException::class);

        $longText = 'long text long text long text long text long text long text long text long text long text long text
                    long text long text long text long text long text long text long text long text long text long text
                    long text long text long text long text long text long text long text long text long text long text';

        new Text($longText);
    }
}

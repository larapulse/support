<?php

namespace Larapulse\Support\Tests\Handlers;

use PHPUnit\Framework\TestCase;
use Larapulse\Support\Handlers\Arr;

class ArrFlattenTest extends TestCase
{
    const INPUT_ARRAY = ['a', ['b', ['c', ['d', 'e'], 'f'], 'g'], 'h'];
    const EMPTY_ARRAY = [];

    public function testInfiniteDepth()
    {
        $outputArray = Arr::flatten(self::INPUT_ARRAY);
        $expected = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

        $this->assertNotEmpty($outputArray);
        $this->assertEquals($expected, $outputArray);
        $this->assertSame($expected, $outputArray);
    }

    public function testPositiveIntegerDepth()
    {
        $outputArray = Arr::flatten(self::INPUT_ARRAY, 2);
        $expected = ['a', 'b', 'c', ['d', 'e'], 'f', 'g', 'h'];

        $this->assertNotEmpty($outputArray);
        $this->assertEquals($expected, $outputArray);
        $this->assertSame($expected, $outputArray);
    }

    public function testNegativeIntegerDepth()
    {
        $outputArray = Arr::flatten(self::INPUT_ARRAY, -2);
        $expected = self::INPUT_ARRAY;

        $this->assertNotEmpty($outputArray);
        $this->assertEquals($expected, $outputArray);
        $this->assertSame($expected, $outputArray);
    }

    public function testWrongFormatDepth()
    {
        $outputArray = Arr::flatten(self::INPUT_ARRAY, 'level_2');
        $expected = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

        $this->assertNotEmpty($outputArray);
        $this->assertEquals($expected, $outputArray);
        $this->assertSame($expected, $outputArray);
    }

    public function testEmptyArray()
    {
        $outputArray = Arr::flatten(self::EMPTY_ARRAY);

        $this->assertEmpty($outputArray);
        $this->assertEquals(self::EMPTY_ARRAY, $outputArray);
        $this->assertSame(self::EMPTY_ARRAY, $outputArray);
    }
}

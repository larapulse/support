<?php

namespace Larapulse\Support\Tests\Handlers;

use PHPUnit\Framework\TestCase;
use Larapulse\Support\Handlers\Arr;

class ArrFlattenAssocTest extends TestCase
{
    const INPUT_ARRAY = [
        'a'     => 1,
        'sub1'  => [
            'b'     => 2,
            'sub2'  => [
                'c'     => 3,
                'sub3'  => [
                    'd'     => 4,
                    'e'     => 5,
                ],
                'f' => 6,
            ],
            'g' => 7,
        ],
        'h' => 8,
    ];

    const EMPTY_ARRAY = [];

    public function testInfiniteDepth()
    {
        $outputArray = Arr::flattenAssoc(self::INPUT_ARRAY);
        $expected = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8];
        ksort($outputArray);
        ksort($expected);

        $this->assertNotEmpty($outputArray);
        $this->assertEquals($expected, $outputArray);
        $this->assertSame($expected, $outputArray);
        $this->assertArrayHasKey('d', $outputArray);
        $this->assertArrayHasKey('e', $outputArray);
    }

    public function testPositiveIntegerDepth()
    {
        $outputArray = Arr::flattenAssoc(self::INPUT_ARRAY, 2);
        $expected = ['a' => 1, 'b' => 2, 'c' => 3, 'sub3' => ['d' => 4, 'e' => 5], 'f' => 6, 'g' => 7, 'h' => 8];
        ksort($outputArray);
        ksort($expected);

        $this->assertNotEmpty($outputArray);
        $this->assertEquals($expected, $outputArray);
        $this->assertSame($expected, $outputArray);
        $this->assertArrayNotHasKey('sub1', $outputArray);
        $this->assertArrayNotHasKey('sub2', $outputArray);
        $this->assertArrayHasKey('sub3', $outputArray);
    }

    public function testNegativeIntegerDepth()
    {
        $outputArray = Arr::flattenAssoc(self::INPUT_ARRAY, -2);
        $expected = self::INPUT_ARRAY;
        ksort($outputArray);
        ksort($expected);

        $this->assertNotEmpty($outputArray);
        $this->assertEquals($expected, $outputArray);
        $this->assertSame($expected, $outputArray);
        $this->assertArrayHasKey('sub1', $outputArray);
        $this->assertArrayNotHasKey('sub2', $outputArray);
        $this->assertArrayNotHasKey('sub3', $outputArray);
    }

    public function testWrongFormatDepth()
    {
        $outputArray = Arr::flattenAssoc(self::INPUT_ARRAY, 'level_2');
        $expected = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8];
        ksort($outputArray);
        ksort($expected);

        $this->assertNotEmpty($outputArray);
        $this->assertEquals($expected, $outputArray);
        $this->assertSame($expected, $outputArray);
        $this->assertArrayNotHasKey('sub1', $outputArray);
        $this->assertArrayNotHasKey('sub2', $outputArray);
        $this->assertArrayNotHasKey('sub3', $outputArray);
    }

    public function testEmptyArray()
    {
        $outputArray = Arr::flattenAssoc(self::EMPTY_ARRAY);

        $this->assertEmpty($outputArray);
        $this->assertEquals(self::EMPTY_ARRAY, $outputArray);
        $this->assertSame(self::EMPTY_ARRAY, $outputArray);
    }
}

<?php

namespace Larapulse\Support\Tests\Handlers;

use PHPUnit\Framework\TestCase;
use Larapulse\Support\Handlers\Arr;

class ArrDepthTest extends TestCase
{
    const FOUR_DEPTH_ARRAY = [
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

    public function testEmpty()
    {
        $depth = Arr::depth(self::EMPTY_ARRAY);

        $this->assertEquals(1, $depth);
        $this->assertNotNull($depth);
    }

    public function testThreeDepth()
    {
        $depth = Arr::depth(self::FOUR_DEPTH_ARRAY);

        $this->assertEquals(4, $depth);
        $this->assertNotNull($depth);
    }
}

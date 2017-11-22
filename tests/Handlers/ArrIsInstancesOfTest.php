<?php

namespace Larapulse\Support\Tests\Handlers;

use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use Larapulse\Support\Handlers\Arr;

class ArrIsInstancesOfTest extends TestCase
{
    public function testUnknownClassOrInterface()
    {
        $result = Arr::isInstancesOf([$this], 'Unknown');

        $this->assertFalse($result);
    }

    public function testNotObject()
    {
        $result1 = Arr::isInstancesOf([null], self::class);
        $this->assertFalse($result1);

        $result2 = Arr::isInstancesOf([$this, null], self::class);
        $this->assertFalse($result2);

        $result3 = Arr::isInstancesOf([null, $this], self::class);
        $this->assertFalse($result3);
    }

    public function testSuccess()
    {
        $result = Arr::isInstancesOf([$this], self::class);
        $this->assertTrue($result);
    }

    public function testSuccessParent()
    {
        $result = Arr::isInstancesOf([$this], TestCase::class);
        $this->assertTrue($result);
    }

    public function testSuccessInterface()
    {
        $result = Arr::isInstancesOf([$this], Test::class);
        $this->assertTrue($result);
    }

    public function testFailed()
    {
        $obj = new \stdClass();

        $result = Arr::isInstancesOf([$this, $obj], Test::class);
        $this->assertFalse($result);

        $result = Arr::isInstancesOf([$obj, $this], Test::class);
        $this->assertFalse($result);

        $result = Arr::isInstancesOf([$obj], Test::class);
        $this->assertFalse($result);
    }
}

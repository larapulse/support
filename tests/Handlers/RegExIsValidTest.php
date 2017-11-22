<?php

namespace Larapulse\Support\Tests\Handlers;

use Larapulse\Support\Handlers\RegEx;
use PHPUnit\Framework\TestCase;

class RegExIsValidTest extends TestCase
{
    public function testSuccess()
    {
        $result = RegEx::isValid('~Valid(Regular)Expression~');

        $this->assertTrue($result);
    }

    public function testFailed()
    {
        $result = RegEx::isValid('~ValidRegular)Expression~');

        $this->assertFalse($result);
    }
}

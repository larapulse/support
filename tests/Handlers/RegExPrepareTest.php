<?php

namespace Larapulse\Support\Tests\Handlers;

use Larapulse\Support\Handlers\RegEx;
use Larapulse\Support\Helpers\Regex as RegexHelper;
use PHPUnit\Framework\TestCase;

class RegExPrepareTest extends TestCase
{
    public function testEmptyQuotes()
    {
        $result = RegEx::prepare('/var/log/nginx', null);

        $this->assertTrue(RegEx::isValid("#^$result#"));
    }

    public function testDefaultQuotes()
    {
        $result = RegEx::prepare('/var/log/nginx');

        $this->assertTrue(RegEx::isValid("/^$result/"));
    }

    public function testCustomQuotes()
    {
        $result = RegEx::prepare('#!/bin/bash', '#');

        $this->assertTrue(RegEx::isValid("#^$result#"));
    }

    public function testSpacesAndTabs()
    {
        $regex = "<div>\r\n\tTest          Suite\r\n</div>";
        $result = RegEx::prepare($regex, null);

        $this->assertTrue(RegEx::isValid("#^$result#"));
        $this->assertEquals('<div>\r\n\tTest\s\s\s\s\s\s\s\s\s\sSuite\r\n</div>', $result);
        $this->assertSame('<div>\r\n\tTest\s\s\s\s\s\s\s\s\s\sSuite\r\n</div>', $result);
    }

    public function testSpacesAndTabsQuantifier()
    {
        $result = RegEx::prepare(' ', null);
        $group = RegexHelper::quantifyGroup($result, 0);

        $this->assertTrue(RegEx::isValid("#$group#"));
        $this->assertEquals('(\s)*', $group);
        $this->assertSame('(\s)*', $group);
    }
}

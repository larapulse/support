<?php

namespace Larapulse\Support\Tests;

use Larapulse\Support\Handlers\RegEx;
use PHPUnit\Framework\TestCase;
use Larapulse\Support\Helpers\Regex as RegexHelper;

class RegExTest extends TestCase
{
    public function testQuantifierNone()
    {
        $result1 = RegexHelper::fetchQuantifier();

        $this->assertEmpty($result1);
        $this->assertEquals('', $result1);
        $this->assertSame('', $result1);

        $result2 = RegexHelper::fetchQuantifier(null, null, true);

        $this->assertEmpty($result2);
        $this->assertEquals('', $result2);
        $this->assertSame('', $result2);
    }

    public function testQuantifierZeroOrMore()
    {
        $result1 = RegexHelper::fetchQuantifier(0);

        $this->assertNotEmpty($result1);
        $this->assertEquals('*', $result1);
        $this->assertSame('*', $result1);

        $result2 = RegexHelper::fetchQuantifier(0, INF, true);

        $this->assertNotEmpty($result2);
        $this->assertEquals('*?', $result2);
        $this->assertSame('*?', $result2);
    }

    public function testQuantifierOneOrMore()
    {
        $result1 = RegexHelper::fetchQuantifier(1);

        $this->assertNotEmpty($result1);
        $this->assertEquals('+', $result1);
        $this->assertSame('+', $result1);

        $result2 = RegexHelper::fetchQuantifier(1, INF, true);

        $this->assertNotEmpty($result2);
        $this->assertEquals('+?', $result2);
        $this->assertSame('+?', $result2);
    }

    public function testQuantifierZeroOrOne()
    {
        $result1 = RegexHelper::fetchQuantifier(0, 1);

        $this->assertNotEmpty($result1);
        $this->assertEquals('?', $result1);
        $this->assertSame('?', $result1);

        $result2 = RegexHelper::fetchQuantifier(0, 1, true);

        $this->assertNotEmpty($result2);
        $this->assertEquals('??', $result2);
        $this->assertSame('??', $result2);
    }

    public function testQuantifierExactlyNTimes()
    {
        $result1 = RegexHelper::fetchQuantifier(5, null);

        $this->assertNotEmpty($result1);
        $this->assertEquals('{5}', $result1);
        $this->assertSame('{5}', $result1);

        $result2 = RegexHelper::fetchQuantifier(5, null, true);

        $this->assertNotEmpty($result2);
        $this->assertEquals('{5}?', $result2);
        $this->assertSame('{5}?', $result2);
    }

    public function testQuantifierAtLeastNTimes()
    {
        $result1 = RegexHelper::fetchQuantifier(5);

        $this->assertNotEmpty($result1);
        $this->assertEquals('{5,}', $result1);
        $this->assertSame('{5,}', $result1);

        $result2 = RegexHelper::fetchQuantifier(5, INF, true);

        $this->assertNotEmpty($result2);
        $this->assertEquals('{5,}?', $result2);
        $this->assertSame('{5,}?', $result2);
    }

    public function testQuantifierFromNToMTimes()
    {
        $result1 = RegexHelper::fetchQuantifier(13, 14);

        $this->assertNotEmpty($result1);
        $this->assertEquals('{13,14}', $result1);
        $this->assertSame('{13,14}', $result1);

        $result2 = RegexHelper::fetchQuantifier(13, 14, true);

        $this->assertNotEmpty($result2);
        $this->assertEquals('{13,14}?', $result2);
        $this->assertSame('{13,14}?', $result2);
    }

    public function testQuantifyGroup()
    {
        $result = RegexHelper::quantifyGroup('string');

        $this->assertNotEmpty($result);
        $this->assertTrue(RegEx::isValid("/$result/"));
        $this->assertEquals('(string)', $result);
        $this->assertSame('(string)', $result);
    }

    public function testQuantifyGroupTag()
    {
        $result = RegexHelper::quantifyGroup('string', null, null, 'demo');

        $this->assertNotEmpty($result);
        $this->assertTrue(RegEx::isValid("/$result/"));
        $this->assertEquals('(?<demo>string)', $result);
        $this->assertSame('(?<demo>string)', $result);
    }
}

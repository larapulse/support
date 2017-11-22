<?php

namespace Larapulse\Support\Tests\Handlers;

use Larapulse\Support\Handlers\Str;
use PHPUnit\Framework\TestCase;

class StrCutStartTest extends TestCase
{
    const EMPTY_STRING          = '';
    const ONE_CHAR_STRING       = 'I';
    const ONE_CHAR_MB_STRING    = 'Ї';
    const LONG_STRING           = 'HHher Majesty the Queen';
    const LONG_MB_STRING        = 'ЇЇї величність королева';

    public function testEmptyString()
    {
        $result = Str::cutStart(self::EMPTY_STRING);

        $this->assertEmpty($result);
        $this->assertEquals(self::EMPTY_STRING, $result);
        $this->assertSame(self::EMPTY_STRING, $result);
    }

    public function testCutEmptySubString()
    {
        $result1 = Str::cutStart(self::LONG_STRING, self::EMPTY_STRING);

        $this->assertNotEmpty($result1);
        $this->assertEquals(self::LONG_STRING, $result1);
        $this->assertSame(self::LONG_STRING, $result1);

        $result2 = Str::cutStart(self::LONG_MB_STRING, self::EMPTY_STRING);

        $this->assertNotEmpty($result2);
        $this->assertEquals(self::LONG_MB_STRING, $result2);
        $this->assertSame(self::LONG_MB_STRING, $result2);
    }

    public function testCutOneCharacter()
    {
        $result1 = Str::cutStart(self::EMPTY_STRING, 'H');

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutStart(self::LONG_STRING, 'H');

        $this->assertNotEmpty($result2);
        $this->assertEquals('Hher Majesty the Queen', $result2);
        $this->assertSame('Hher Majesty the Queen', $result2);

        $result3 = Str::cutStart(self::LONG_MB_STRING, 'Ї');

        $this->assertNotEmpty($result3);
        $this->assertEquals('Її величність королева', $result3);
        $this->assertSame('Її величність королева', $result3);
    }

    public function testCutOneCharacterRepeat()
    {
        $result1 = Str::cutStart(self::LONG_STRING, 'H', true);

        $this->assertNotEmpty($result1);
        $this->assertEquals('her Majesty the Queen', $result1);
        $this->assertSame('her Majesty the Queen', $result1);

        $result2 = Str::cutStart(self::LONG_MB_STRING, 'Ї', true);

        $this->assertNotEmpty($result2);
        $this->assertEquals('ї величність королева', $result2);
        $this->assertSame('ї величність королева', $result2);
    }

    public function testCutManyCharacters()
    {
        $result1 = Str::cutStart(self::EMPTY_STRING, 'HH');

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutStart(self::LONG_STRING, 'HH');

        $this->assertNotEmpty($result2);
        $this->assertEquals('her Majesty the Queen', $result2);
        $this->assertSame('her Majesty the Queen', $result2);

        $result3 = Str::cutStart(self::LONG_MB_STRING, 'ЇЇ');

        $this->assertNotEmpty($result3);
        $this->assertEquals('ї величність королева', $result3);
        $this->assertSame('ї величність королева', $result3);
    }

    public function testCutOneCharacterCaseInsensitive()
    {
        $result1 = Str::cutStart(self::EMPTY_STRING, 'h', false, false);

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutStart(self::LONG_STRING, 'h', false, false);

        $this->assertNotEmpty($result2);
        $this->assertEquals('Hher Majesty the Queen', $result2);
        $this->assertSame('Hher Majesty the Queen', $result2);

        $result3 = Str::cutStart(self::LONG_MB_STRING, 'ї', false, false);

        $this->assertNotEmpty($result3);
        $this->assertNotEquals('Її величність королева', $result3);
        $this->assertNotSame('Її величність королева', $result3);
        $this->assertEquals(self::LONG_MB_STRING, $result3);
        $this->assertSame(self::LONG_MB_STRING, $result3);
    }

    public function testCutOneCharacterCaseInsensitiveRepeat()
    {
        $result1 = Str::cutStart(self::EMPTY_STRING, 'H', true, false);

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutStart(self::LONG_STRING, 'H', true, false);

        $this->assertNotEmpty($result2);
        $this->assertEquals('er Majesty the Queen', $result2);
        $this->assertSame('er Majesty the Queen', $result2);

        $result3 = Str::cutStart(self::LONG_MB_STRING, 'Ї', true, false);

        $this->assertNotEmpty($result3);
        $this->assertNotEquals(' величність королева', $result3);
        $this->assertNotSame(' величність королева', $result3);
        $this->assertEquals('ї величність королева', $result3);
        $this->assertSame('ї величність королева', $result3);
    }

    public function testCutManyCharactersCaseInsensitive()
    {
        $result1 = Str::cutStart(self::EMPTY_STRING, 'HHH', false, false);

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutStart(self::LONG_STRING, 'HHH', false, false);

        $this->assertNotEmpty($result2);
        $this->assertEquals('er Majesty the Queen', $result2);
        $this->assertSame('er Majesty the Queen', $result2);

        $result3 = Str::cutStart(self::LONG_MB_STRING, 'ЇЇЇ', false, false);

        $this->assertNotEmpty($result3);
        $this->assertNotEquals(' величність королева', $result3);
        $this->assertNotSame(' величність королева', $result3);
        $this->assertEquals(self::LONG_MB_STRING, $result3);
        $this->assertSame(self::LONG_MB_STRING, $result3);
    }
}

<?php

namespace Larapulse\Support\Tests\Handlers;

use Larapulse\Support\Handlers\Str;
use PHPUnit\Framework\TestCase;

class StrCutEndTest extends TestCase
{
    const EMPTY_STRING          = '';
    const ONE_CHAR_STRING       = 'I';
    const ONE_CHAR_MB_STRING    = 'Ї';
    const LONG_STRING           = 'some_file_name.p.cpPP.cpPP';
    const LONG_MB_STRING        = 'такі прекрасні очі їїЇЇЇ';

    public function testEmptyString()
    {
        $result = Str::cutEnd(self::EMPTY_STRING);

        $this->assertEmpty($result);
        $this->assertEquals(self::EMPTY_STRING, $result);
        $this->assertSame(self::EMPTY_STRING, $result);
    }

    public function testCutEmptySubString()
    {
        $result1 = Str::cutEnd(self::LONG_STRING, self::EMPTY_STRING);

        $this->assertNotEmpty($result1);
        $this->assertEquals(self::LONG_STRING, $result1);
        $this->assertSame(self::LONG_STRING, $result1);

        $result2 = Str::cutEnd(self::LONG_MB_STRING, self::EMPTY_STRING);

        $this->assertNotEmpty($result2);
        $this->assertEquals(self::LONG_MB_STRING, $result2);
        $this->assertSame(self::LONG_MB_STRING, $result2);
    }

    public function testCutOneCharacter()
    {
        $result1 = Str::cutEnd(self::EMPTY_STRING, '.cpp');

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutEnd(self::LONG_STRING, 'P');

        $this->assertNotEmpty($result2);
        $this->assertEquals('some_file_name.p.cpPP.cpP', $result2);
        $this->assertSame('some_file_name.p.cpPP.cpP', $result2);

        $result3 = Str::cutEnd(self::LONG_MB_STRING, 'Ї');

        $this->assertNotEmpty($result3);
        $this->assertEquals('такі прекрасні очі їїЇЇ', $result3);
        $this->assertSame('такі прекрасні очі їїЇЇ', $result3);
    }

    public function testCutOneCharacterRepeat()
    {
        $result1 = Str::cutEnd(self::LONG_STRING, 'P', true);

        $this->assertNotEmpty($result1);
        $this->assertEquals('some_file_name.p.cpPP.cp', $result1);
        $this->assertSame('some_file_name.p.cpPP.cp', $result1);

        $result2 = Str::cutEnd(self::LONG_MB_STRING, 'Ї', true);

        $this->assertNotEmpty($result2);
        $this->assertEquals('такі прекрасні очі її', $result2);
        $this->assertSame('такі прекрасні очі її', $result2);
    }

    public function testCutManyCharacters()
    {
        $result1 = Str::cutEnd(self::EMPTY_STRING, '.cpp');

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutEnd(self::LONG_STRING, '.cpPP');

        $this->assertNotEmpty($result2);
        $this->assertEquals('some_file_name.p.cpPP', $result2);
        $this->assertSame('some_file_name.p.cpPP', $result2);
        $this->assertNotEquals(rtrim(self::LONG_STRING), $result2);
        $this->assertNotSame(rtrim(self::LONG_STRING), $result2);

        $result3 = Str::cutEnd(self::LONG_MB_STRING, 'ЇЇЇ');

        $this->assertNotEmpty($result3);
        $this->assertEquals('такі прекрасні очі її', $result3);
        $this->assertSame('такі прекрасні очі її', $result3);
    }

    public function testCutOneCharacterCaseInsensitive()
    {
        $result1 = Str::cutEnd(self::EMPTY_STRING, 'p', false, false);

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutEnd(self::LONG_STRING, 'P', false, false);

        $this->assertNotEmpty($result2);
        $this->assertEquals('some_file_name.p.cpPP.cpP', $result2);
        $this->assertSame('some_file_name.p.cpPP.cpP', $result2);

        $result3 = Str::cutEnd(self::LONG_MB_STRING, 'ї', false, false);

        $this->assertNotEmpty($result3);
        $this->assertNotEquals('Її величність королева', $result3);
        $this->assertNotSame('Її величність королева', $result3);
        $this->assertEquals(self::LONG_MB_STRING, $result3);
        $this->assertSame(self::LONG_MB_STRING, $result3);
    }

    public function testCutOneCharacterCaseInsensitiveRepeat()
    {
        $result1 = Str::cutEnd(self::EMPTY_STRING, '.cpp', true, false);

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutEnd(self::LONG_STRING, 'P', true, false);

        $this->assertNotEmpty($result2);
        $this->assertEquals('some_file_name.p.cpPP.c', $result2);
        $this->assertSame('some_file_name.p.cpPP.c', $result2);

        $result3 = Str::cutEnd(self::LONG_MB_STRING, 'Ї', true, false);

        $this->assertNotEmpty($result3);
        $this->assertNotEquals('такі прекрасні очі ', $result3);
        $this->assertNotSame('такі прекрасні очі ', $result3);
        $this->assertEquals('такі прекрасні очі її', $result3);
        $this->assertSame('такі прекрасні очі її', $result3);
    }

    public function testCutManyCharactersCaseInsensitive()
    {
        $result1 = Str::cutEnd(self::EMPTY_STRING, '.cpPP', false, false);

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutEnd(self::LONG_STRING, '.cpPP', false, false);

        $this->assertNotEmpty($result2);
        $this->assertEquals('some_file_name.p.cpPP', $result2);
        $this->assertSame('some_file_name.p.cpPP', $result2);
        $this->assertNotEquals(rtrim(self::LONG_STRING, '.cpPP'), $result2);
        $this->assertNotSame(rtrim(self::LONG_STRING, '.cpPP'), $result2);

        $result3 = Str::cutEnd(self::LONG_MB_STRING, 'ЇЇЇ', false, false);

        $this->assertNotEmpty($result3);
        $this->assertEquals('такі прекрасні очі її', $result3);
        $this->assertSame('такі прекрасні очі її', $result3);
    }

    public function testCutManyCharactersCaseInsensitiveRepeat()
    {
        $result1 = Str::cutEnd(self::EMPTY_STRING, '.cpPP', true, false);

        $this->assertEmpty($result1);
        $this->assertEquals(self::EMPTY_STRING, $result1);
        $this->assertSame(self::EMPTY_STRING, $result1);

        $result2 = Str::cutEnd(self::LONG_STRING, '.cpPP', true, false);

        $this->assertNotEmpty($result2);
        $this->assertEquals('some_file_name.p', $result2);
        $this->assertSame('some_file_name.p', $result2);
        $this->assertNotEquals(rtrim(self::LONG_STRING, '.cpPP'), $result2);
        $this->assertNotSame(rtrim(self::LONG_STRING, '.cpPP'), $result2);

        $result3 = Str::cutEnd(self::LONG_MB_STRING, 'ЇЇЇ', true, false);

        $this->assertNotEmpty($result3);
        $this->assertEquals('такі прекрасні очі її', $result3);
        $this->assertSame('такі прекрасні очі її', $result3);
    }
}

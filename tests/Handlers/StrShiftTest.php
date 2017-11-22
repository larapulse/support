<?php

namespace Larapulse\Support\Tests\Handlers;

use Larapulse\Support\Handlers\Str;
use PHPUnit\Framework\TestCase;

class StrShiftTest extends TestCase
{
    const EMPTY_STRING          = '';
    const ONE_CHAR_STRING       = 'I';
    const ONE_CHAR_MB_STRING    = 'Ї';
    const LONG_STRING           = 'Her Majesty the Queen';
    const LONG_MB_STRING        = 'Її величність королева';

    public function testEmpty()
    {
        $str = self::EMPTY_STRING;
        $result = Str::shift($str);

        $this->assertEmpty($str);
        $this->assertEmpty($result);
        $this->assertSame(self::EMPTY_STRING, $result);
        $this->assertEquals(self::EMPTY_STRING, $result);
    }

    public function testOneCharacter()
    {
        $str = self::ONE_CHAR_STRING;
        $result = Str::shift($str);

        $this->assertEmpty($str);
        $this->assertNotEmpty($result);
        $this->assertEquals(self::ONE_CHAR_STRING, $result);
        $this->assertSame(self::ONE_CHAR_STRING, $result);
        $this->assertEquals('I', $result);
        $this->assertSame('I', $result);
    }

    public function testOneMultiByteCharacter()
    {
        $str = self::ONE_CHAR_MB_STRING;
        $result = Str::shift($str);

        $this->assertEmpty($str);
        $this->assertNotEmpty($result);
        $this->assertEquals(self::ONE_CHAR_MB_STRING, $result);
        $this->assertSame(self::ONE_CHAR_MB_STRING, $result);
        $this->assertEquals('Ї', $result);
        $this->assertSame('Ї', $result);
    }

    public function testLongString()
    {
        $str = self::LONG_STRING;
        $result = Str::shift($str);

        $this->assertNotEmpty($str);
        $this->assertNotEmpty($result);
        $this->assertNotEquals(self::LONG_STRING, $str);
        $this->assertNotSame(self::LONG_STRING, $str);
        $this->assertEquals('H', $result);
        $this->assertSame('H', $result);
    }

    public function testLongMultiByteString()
    {
        $str = self::LONG_MB_STRING;
        $result = Str::shift($str);

        $this->assertNotEmpty($str);
        $this->assertNotEmpty($result);
        $this->assertNotEquals(self::LONG_MB_STRING, $str);
        $this->assertNotSame(self::LONG_MB_STRING, $str);
        $this->assertEquals('Ї', $result);
        $this->assertSame('Ї', $result);
    }

    public function testUtf7Encoding()
    {
        $this->encodingTest('UTF-7');
    }

    public function testUtf8Encoding()
    {
        $this->encodingTest('UTF-8');
    }

    public function testUtf16Encoding()
    {
        $this->encodingTest('UTF-16');
    }

    public function testUcs2Encoding()
    {
        $this->encodingTest('UCS2');
    }

    /**
     * Test Str::shift() with different encodings
     *
     * @param string $encoding
     */
    private function encodingTest(string $encoding)
    {
        $str1 = mb_convert_encoding(self::LONG_STRING, $encoding);
        $char1 = mb_convert_encoding('H', $encoding);
        $result1 = Str::shift($str1, $encoding);

        $this->assertNotEmpty($str1);
        $this->assertNotEmpty($result1);
        $this->assertNotEquals(self::LONG_STRING, $str1);
        $this->assertNotSame(self::LONG_STRING, $str1);
        $this->assertEquals($char1, $result1);
        $this->assertSame($char1, $result1);

        $str2 = mb_convert_encoding(self::LONG_MB_STRING, $encoding);
        $char2 = mb_convert_encoding('Ї', $encoding);
        $result2 = Str::shift($str2, $encoding);

        $this->assertNotEmpty($str2);
        $this->assertNotEmpty($result2);
        $this->assertNotEquals(self::LONG_MB_STRING, $str2);
        $this->assertNotSame(self::LONG_MB_STRING, $str2);
        $this->assertEquals($char2, $result2);
        $this->assertSame($char2, $result2);
    }
}

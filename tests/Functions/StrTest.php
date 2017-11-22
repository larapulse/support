<?php

namespace Larapulse\Support\Tests\Functions;

use PHPUnit\Framework\TestCase;
use Larapulse\Support\Handlers\Str;
use Larapulse\Support\Handlers\RegEx;
use Illuminate\Support\Str as IlluminateStr;

class StrTest extends TestCase
{
    public function testPop()
    {
        $input1 = $input2 = 'string';
        $funcResult = str_pop($input1);
        $classResult = Str::pop($input2);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testShift()
    {
        $input1 = $input2 = 'string';
        $funcResult = str_shift($input1);
        $classResult = Str::shift($input2);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testIsRegex()
    {
        $input = 'string';
        $funcResult = is_regex($input);
        $classResult = RegEx::isValid($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testPrepareRegex()
    {
        $input = 'string params';
        $funcResult = str_prepare_regex($input);
        $classResult = RegEx::prepare($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testCutStart()
    {
        $input = 'str_string';
        $funcResult = str_cut_start($input, 'str_');
        $classResult = Str::cutStart($input, 'str_');

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testCutEnd()
    {
        $input = 'string.php';
        $funcResult = str_cut_end($input, '.php');
        $classResult = Str::cutEnd($input, '.php');

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testLower()
    {
        $input = 'string';
        $funcResult = str_lower($input);
        $classResult = IlluminateStr::lower($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testUpper()
    {
        $input = 'string';
        $funcResult = str_upper($input);
        $classResult = IlluminateStr::upper($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testTitle()
    {
        $input = 'string';
        $funcResult = str_title($input);
        $classResult = IlluminateStr::title($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testLength()
    {
        $input = 'string';
        $funcResult = str_length($input);
        $classResult = IlluminateStr::length($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testWords()
    {
        $input = 'string';
        $funcResult = str_words($input);
        $classResult = IlluminateStr::words($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testSubstr()
    {
        $input = 'string';
        $funcResult = str_substr($input, 2);
        $classResult = IlluminateStr::substr($input, 2);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testUcFirst()
    {
        $input = 'string';
        $funcResult = str_ucfirst($input);
        $classResult = IlluminateStr::ucfirst($input);

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testStartsWith()
    {
        $input = 'str_string';
        $funcResult = str_starts_with($input, 'str_');
        $classResult = IlluminateStr::startsWith($input, 'str');

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }

    public function testEndsWith()
    {
        $input = 'string.php';
        $funcResult = str_ends_with($input, '.php');
        $classResult = IlluminateStr::endsWith($input, '.php');

        $this->assertEquals($classResult, $funcResult);
        $this->assertSame($classResult, $funcResult);
    }
}

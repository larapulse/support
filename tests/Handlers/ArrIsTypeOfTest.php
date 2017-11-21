<?php

namespace Larapulse\Support\Tests\Handlers;

use Larapulse\Support\Helpers\DataTypes;
use PHPUnit\Framework\TestCase;
use Larapulse\Support\Handlers\Arr;

class ArrIsTypeOfTest extends TestCase
{
    public function testUnknownType()
    {
        $input = [1, 2, 3];
        $result = Arr::isTypeOf($input, 'something');

        $this->assertFalse($result);
    }

    public function testIntegerSuccess()
    {
        $input = [1, 2, 3];
        $result = Arr::isTypeOf($input, DataTypes::INTEGER_TYPE);

        $this->assertTrue($result);
    }

    public function testIntAliasSuccess()
    {
        $input = [1, 2, 3];
        $result = Arr::isTypeOf($input, 'int');

        $this->assertTrue($result);
    }

    public function testDoubleSuccess()
    {
        $input = [1., 2.5, 3.1];
        $result = Arr::isTypeOf($input, DataTypes::FLOAT_TYPE);

        $this->assertTrue($result);
    }

    public function testFloatAliasSuccess()
    {
        $input = [1., 2.5, 3.1];
        $result = Arr::isTypeOf($input, 'float');

        $this->assertTrue($result);
    }

    public function testRealAliasSuccess()
    {
        $input = [1., 2.5, 3.1];
        $result = Arr::isTypeOf($input, 'real');

        $this->assertTrue($result);
    }

    public function testStringSuccess()
    {
        $input = ['str1', 'str2', 'str3'];
        $result = Arr::isTypeOf($input, DataTypes::STRING_TYPE);

        $this->assertTrue($result);
    }

    public function testStrAliasSuccess()
    {
        $input = ['str1', 'str2', 'str3'];
        $result = Arr::isTypeOf($input, 'str');

        $this->assertTrue($result);
    }

    public function testBooleanSuccess()
    {
        $input = [true, false, true];
        $result = Arr::isTypeOf($input, DataTypes::BOOLEAN_TYPE);

        $this->assertTrue($result);
    }

    public function testBoolAliasSuccess()
    {
        $input = [true, false, true];
        $result = Arr::isTypeOf($input, 'bool');

        $this->assertTrue($result);
    }

    public function testArraySuccess()
    {
        $input = [[1], ['a' => 1], []];
        $result = Arr::isTypeOf($input, DataTypes::ARRAY_TYPE);

        $this->assertTrue($result);
    }

    public function testObjectSuccess()
    {
        $obj1 = $obj2 = $obj3 = new \stdClass();

        $input = [$obj1, $obj2, $obj3];
        $result = Arr::isTypeOf($input, DataTypes::OBJECT_TYPE);

        $this->assertTrue($result);
    }

    public function testResourceSuccess()
    {
        $resource = fopen(__DIR__.'/.gitkeep', 'r');

        $input = [$resource, $resource, $resource];
        $result = Arr::isTypeOf($input, DataTypes::RESOURCE_TYPE);

        fclose($resource);

        $this->assertTrue($result);
    }

    public function testNullSuccess()
    {
        $input = [null, null, null];
        $result = Arr::isTypeOf($input, DataTypes::NULL_TYPE);

        $this->assertTrue($result);
    }

    public function testIntegerFailed()
    {
        $input = [1, 2., 3];
        $result = Arr::isTypeOf($input, DataTypes::INTEGER_TYPE);

        $this->assertFalse($result);
    }

    public function testIntAliasFailed()
    {
        $input = [1, 2., 3];
        $result = Arr::isTypeOf($input, 'int');

        $this->assertFalse($result);
    }

    public function testDoubleFailed()
    {
        $input = [1., 2, 3.1];
        $result = Arr::isTypeOf($input, DataTypes::FLOAT_TYPE);

        $this->assertFalse($result);
    }

    public function testFloatAliasFailed()
    {
        $input = [1., 2, 3.1];
        $result = Arr::isTypeOf($input, 'float');

        $this->assertFalse($result);
    }

    public function testRealAliasFailed()
    {
        $input = [1., 2, 3.1];
        $result = Arr::isTypeOf($input, 'real');

        $this->assertFalse($result);
    }

    public function testStringFailed()
    {
        $input = ['str1', 2, 'str3'];
        $result = Arr::isTypeOf($input, DataTypes::STRING_TYPE);

        $this->assertFalse($result);
    }

    public function testStrAliasFailed()
    {
        $input = ['str1', 2, 'str3'];
        $result = Arr::isTypeOf($input, 'str');

        $this->assertFalse($result);
    }

    public function testBooleanFailed()
    {
        $input = [true, 0, true];
        $result = Arr::isTypeOf($input, DataTypes::BOOLEAN_TYPE);

        $this->assertFalse($result);
    }

    public function testBoolAliasFailed()
    {
        $input = [true, 0, true];
        $result = Arr::isTypeOf($input, 'bool');

        $this->assertFalse($result);
    }

    public function testArrayFailed()
    {
        $input = [[1], ['a' => 1], null, []];
        $result = Arr::isTypeOf($input, DataTypes::ARRAY_TYPE);

        $this->assertFalse($result);
    }

    public function testObjectFailed()
    {
        $obj1 = $obj3 = new \stdClass();
        $input = [$obj1, null, $obj3];

        $result = Arr::isTypeOf($input, DataTypes::OBJECT_TYPE);

        $this->assertFalse($result);
    }

    public function testResourceFailed()
    {
        $resource = fopen(__DIR__.'/.gitkeep', 'r');

        $input = [$resource, null, $resource];
        $result = Arr::isTypeOf($input, DataTypes::RESOURCE_TYPE);

        fclose($resource);

        $this->assertFalse($result);
    }

    public function testNullFailed()
    {
        $input = [null, 0, ''];
        $result = Arr::isTypeOf($input, DataTypes::NULL_TYPE);

        $this->assertFalse($result);
    }
}

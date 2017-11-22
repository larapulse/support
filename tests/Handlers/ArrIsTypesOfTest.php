<?php

namespace Larapulse\Support\Tests\Handlers;

use Larapulse\Support\Helpers\DataTypes;
use PHPUnit\Framework\TestCase;
use Larapulse\Support\Handlers\Arr;

class ArrIsTypesOfTest extends TestCase
{
    const UNKNOWN_DATA_TYPE = 'unknown';

    public function testUnsupportedTypes()
    {
        $types = [
            DataTypes::INTEGER_TYPE,
            [DataTypes::FLOAT_TYPE, DataTypes::NULL_TYPE]
        ];

        $result = Arr::isTypesOf([1], $types);

        $this->assertFalse($result);
    }

    public function testOnlyUnknownTypes()
    {
        $result1 = Arr::isTypesOf([1], [self::UNKNOWN_DATA_TYPE, 'more']);
        $this->assertFalse($result1);

        $result2 = Arr::isTypesOf([1], [self::UNKNOWN_DATA_TYPE]);
        $this->assertFalse($result2);
    }

    public function testWithUnknownType()
    {
        $result1 = Arr::isTypesOf([1], [DataTypes::INTEGER_TYPE, self::UNKNOWN_DATA_TYPE, DataTypes::FLOAT_TYPE]);
        $this->assertFalse($result1);

        $result2 = Arr::isTypesOf([1], [DataTypes::INTEGER_TYPE, self::UNKNOWN_DATA_TYPE]);
        $this->assertFalse($result2);

        $result3 = Arr::isTypesOf([1], [self::UNKNOWN_DATA_TYPE, DataTypes::FLOAT_TYPE]);
        $this->assertFalse($result3);
    }

    public function testEmptyTypes()
    {
        $result = Arr::isTypesOf([1], []);
        $this->assertFalse($result);
    }

    public function testGeneralDataTypesSuccess()
    {
        $types = [DataTypes::INTEGER_TYPE, DataTypes::FLOAT_TYPE];
        $result = Arr::isTypesOf([1, 2., 3], $types);

        $this->assertTrue($result);
    }

    public function testAliasDataTypesSuccess()
    {
        $types = ['str', 'real'];
        $result = Arr::isTypesOf(['1', 2., ''], $types);
        $this->assertTrue($result);
    }

    public function testMixedDataTypesSuccess()
    {
        $types1 = [DataTypes::INTEGER_TYPE, 'real'];
        $result1 = Arr::isTypesOf([1, 2., 3], $types1);
        $this->assertTrue($result1);

        $types2 = [DataTypes::INTEGER_TYPE, 'real', DataTypes::STRING_TYPE];
        $result2 = Arr::isTypesOf([1, 2., 3], $types2);
        $this->assertTrue($result2);

        $types3 = ['real', DataTypes::STRING_TYPE];
        $result3 = Arr::isTypesOf(["1", 2., ""], $types3);
        $this->assertTrue($result3);
    }

    public function testGeneralDataTypesFailed()
    {
        $types = [DataTypes::INTEGER_TYPE, DataTypes::FLOAT_TYPE];
        $result = Arr::isTypesOf([1, 2., '3'], $types);

        $this->assertFalse($result);
    }

    public function testAliasDataTypesFailed()
    {
        $types = ['str', 'real'];
        $result = Arr::isTypesOf(['1', 2., '', 1], $types);
        $this->assertFalse($result);
    }

    public function testMixedDataTypesFailed()
    {
        $types1 = [DataTypes::INTEGER_TYPE, 'real'];
        $result1 = Arr::isTypesOf([1, 2., '', 3], $types1);
        $this->assertFalse($result1);

        $types2 = [DataTypes::INTEGER_TYPE, 'real', DataTypes::STRING_TYPE];
        $result2 = Arr::isTypesOf([1, 2., null, 3], $types2);
        $this->assertFalse($result2);

        $types3 = ['real', DataTypes::STRING_TYPE];
        $result3 = Arr::isTypesOf(["1", 2., false, ""], $types3);
        $this->assertFalse($result3);
    }
}

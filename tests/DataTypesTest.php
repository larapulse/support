<?php

namespace Larapulse\Support\Tests;

use Larapulse\Support\Helpers\DataTypes;
use PHPUnit\Framework\TestCase;

class DataTypesTest extends TestCase
{
    const SOME_UNKNOWN_TYPE = 'unknown';

    /**
     * Test that true does in fact equal true
     */
    public function testGuessAlias()
    {
        $this->assertSame(DataTypes::FLOAT_TYPE, DataTypes::guessFromAlias(DataTypes::FLOAT_TYPE));
        $this->assertSame(DataTypes::INTEGER_TYPE, DataTypes::guessFromAlias(DataTypes::INTEGER_TYPE));
        $this->assertSame(DataTypes::BOOLEAN_TYPE, DataTypes::guessFromAlias(DataTypes::BOOLEAN_TYPE));
        $this->assertSame(DataTypes::STRING_TYPE, DataTypes::guessFromAlias(DataTypes::STRING_TYPE));
        $this->assertSame(DataTypes::ARRAY_TYPE, DataTypes::guessFromAlias(DataTypes::ARRAY_TYPE));
        $this->assertSame(DataTypes::OBJECT_TYPE, DataTypes::guessFromAlias(DataTypes::OBJECT_TYPE));
        $this->assertSame(DataTypes::RESOURCE_TYPE, DataTypes::guessFromAlias(DataTypes::RESOURCE_TYPE));
        $this->assertSame(DataTypes::NULL_TYPE, DataTypes::guessFromAlias(DataTypes::NULL_TYPE));

        $this->assertSame(DataTypes::FLOAT_TYPE, DataTypes::guessFromAlias('real'));
        $this->assertSame(DataTypes::INTEGER_TYPE, DataTypes::guessFromAlias('int'));
        $this->assertSame(DataTypes::BOOLEAN_TYPE, DataTypes::guessFromAlias('bool'));
        $this->assertSame(DataTypes::STRING_TYPE, DataTypes::guessFromAlias('string'));

        $this->assertNotEmpty(DataTypes::guessFromAlias(self::SOME_UNKNOWN_TYPE));
        $this->assertSame(self::SOME_UNKNOWN_TYPE, DataTypes::guessFromAlias(self::SOME_UNKNOWN_TYPE));
    }
}

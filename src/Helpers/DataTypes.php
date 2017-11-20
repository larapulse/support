<?php

namespace Larapulse\Support\Helpers;

class DataTypes
{
    const BOOLEAN_TYPE  = 'boolean';
    const INTEGER_TYPE  = 'integer';
    const FLOAT_TYPE    = 'double';
    const STRING_TYPE   = 'string';
    const ARRAY_TYPE    = 'array';
    const OBJECT_TYPE   = 'object';
    const RESOURCE_TYPE = 'resource';
    const NULL_TYPE     = 'NULL';

    const TYPES         = [
        self::BOOLEAN_TYPE,
        self::INTEGER_TYPE,
        self::FLOAT_TYPE,
        self::STRING_TYPE,
        self::ARRAY_TYPE,
        self::OBJECT_TYPE,
        self::RESOURCE_TYPE,
        self::NULL_TYPE,
    ];

    const ALIASES       = [
        'bool'  => self::BOOLEAN_TYPE,
        'str'   => self::STRING_TYPE,
        'int'   => self::INTEGER_TYPE,
        'float' => self::FLOAT_TYPE,
        'real'  => self::FLOAT_TYPE,
    ];

    public static function guessFromAlias(string $type)
    {
        return self::ALIASES[$type] ?? $type;
    }
}

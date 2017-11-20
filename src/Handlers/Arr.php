<?php

namespace Larapulse\Support\Handlers;

use Larapulse\Support\Helpers\DataTypes;

class Arr
{
    /**
     * Flatten a multi-dimensional array into a single level
     *
     * @param  array  $array
     * @param  int  $depth
     * @return array
     */
    public static function flatten(array $array, $depth = INF) : array
    {
        $depth = is_int($depth) ? max($depth, 1) : INF;

        return array_reduce($array, function ($result, $item) use ($depth) {
            if (!is_array($item)) {
                return array_merge($result, [$item]);
            } elseif ($depth === 1) {
                return array_merge($result, array_values($item));
            } else {
                return array_merge($result, self::flatten($item, $depth - 1));
            }
        }, []);
    }

    /**
     * Flatten a multi-dimensional array into a single level with saving keys
     *
     * @param  array $array
     * @param  int   $depth
     *
     * @return array
     */
    public static function flattenAssoc(array $array, $depth = INF) : array
    {
        $result = [];
        $depth = is_int($depth) ? max($depth, 1) : INF;

        foreach ($array as $key => $value) {
            if (is_array($value) && $depth > 1) {
                $result = self::flattenAssoc($value, $depth - 1) + $result;
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * Get depth of array
     *
     * @param array $array
     *
     * @return int
     */
    public static function depth(array $array) : int
    {
        $maxDepth = 1;

        foreach ($array as $value) {
            if (is_array($value)) {
                $depth = self::depth($value) + 1;

                if ($depth > $maxDepth) {
                    $maxDepth = $depth;
                }
            }
        }

        return $maxDepth;
    }

    /**
     * Check if array contains only a specific type
     *
     * @param array  $array
     * @param string $type
     *
     * @return bool
     */
    public static function isTypeOf(array $array, string $type) : bool
    {
        $type = DataTypes::guessFromAlias($type);

        if (!in_array($type, DataTypes::TYPES)) {
            return false;
        }

        foreach ($array as $item) {
            if (gettype($item) !== $type) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if array contains only a specific type
     *
     * @param array  $array
     * @param array  $types
     *
     * @return bool
     */
    public static function isTypesOf(array $array, array $types) : bool
    {
        if (!self::isTypeOf($types, 'string')) {
            return false;
        }

        $types = array_map(function ($type) {
            return DataTypes::guessFromAlias($type);
        }, $types);

        if (array_diff($types, DataTypes::TYPES)) {
            return false;
        }

        foreach ($array as $item) {
            if (!in_array(gettype($item), $types, true)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if array contains instances of specified class/interface
     *
     * @param array  $array
     * @param string $className
     *
     * @return bool
     */
    public static function isInstancesOf(array $array, string $className) : bool
    {
        if (!class_exists($className) && !interface_exists($className)) {
            return false;
        }

        $result = true;

        foreach ($array as $item) {
            $result = is_object($item) && $item instanceof $className && $result;
        }

        return $result;
    }
}

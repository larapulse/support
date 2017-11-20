<?php

use Larapulse\Support\Handlers\Arr;
use Illuminate\Support\Arr as IlluminateArr;

if (!function_exists('array_flatten')) {
    /**
     * Flatten a multi-dimensional array into a single level
     *
     * @param  array  $array
     * @param  int  $depth
     * @return array
     */
    function array_flatten($array, $depth = INF) : array
    {
        return Arr::flatten($array, $depth);
    }
}

if (!function_exists('array_flatten_assoc')) {
    /**
     * Flatten a multi-dimensional array into a single level with saving keys
     *
     * @param  array  $array
     * @return array
     */
    function array_flatten_assoc(array $array) : array
    {
        return Arr::flattenAssoc($array);
    }
}

if (!function_exists('array_depth')) {
    /**
     * Get depth of array
     *
     * @param  array  $array
     * @return int
     */
    function array_depth($array) : int
    {
        return Arr::depth($array);
    }
}

if (!function_exists('is_array_of_type')) {
    /**
     * Check if array contains from specific type
     *
     * @param array  $array
     * @param string $type
     *
     * @return bool
     */
    function is_array_of_type(array $array, string $type) : bool
    {
        return Arr::isTypeOf($array, $type);
    }
}

if (!function_exists('is_array_of_types')) {
    /**
     * Check if array contains from specific types
     *
     * @param array  $array
     * @param array  $types
     *
     * @return bool
     */
    function is_array_of_types(array $array, array $types) : bool
    {
        return Arr::isTypesOf($array, $types);
    }
}

if (!function_exists('is_array_of_instance')) {
    /**
     * Check if array contains instances of specified class/interface
     *
     * @param array  $array
     * @param string $className
     *
     * @return bool
     */
    function is_array_of_instance(array $array, string $className) : bool
    {
        return Arr::isInstancesOf($array, $className);
    }
}

if (!function_exists('array_is_assoc')) {
    /**
     * Determines if an array is associative
     *
     * An array is "associative" if it doesn't have sequential numerical keys beginning with zero
     *
     * @param  array  $array
     * @return bool
     */
    function array_is_assoc(array $array) : bool
    {
        return IlluminateArr::isAssoc($array);
    }
}

if (!function_exists('array_only')) {
    /**
     * Get a subset of the items from the given array
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     */
    function array_only($array, $keys) : array
    {
        return IlluminateArr::only($array, $keys);
    }
}

if (!function_exists('array_head')) {
    /**
     * Get the first element of an array. Useful for method chaining
     *
     * @param  array  $array
     * @return mixed
     */
    function array_head($array)
    {
        return reset($array);
    }
}

if (!function_exists('array_last')) {
    /**
     * Get the last element from an array
     *
     * @param  array  $array
     * @return mixed
     */
    function array_last($array)
    {
        return end($array);
    }
}

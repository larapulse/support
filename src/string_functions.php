<?php

use Larapulse\Support\Handlers\Str;
use Larapulse\Support\Handlers\RegEx;
use Illuminate\Support\Str as IlluminateStr;

if (!function_exists('str_pop')) {
    /**
     * Pop the character off the end of string
     *
     * @param string $str
     * @param string $encoding
     *
     * @return bool|string
     */
    function str_pop(string &$str, string $encoding = null)
    {
        return Str::pop($str, $encoding);
    }
}

if (!function_exists('str_shift')) {
    /**
     * Shift a character off the beginning of string
     *
     * @param string $str
     * @param string $encoding
     *
     * @return bool|string
     */
    function str_shift(string &$str, string $encoding = null)
    {
        return Str::shift($str, $encoding);
    }
}

if (!function_exists('is_regex')) {
    /**
     * Validate if RegEx statement is valid
     *
     * @param string $regexStatement
     *
     * @return bool
     */
    function is_regex(string $regexStatement) : bool
    {
        return RegEx::isValid($regexStatement);
    }
}

if (!function_exists('str_prepare_regex')) {
    /**
     * Prepare string to be safety used in regex
     *
     * @param string $string
     * @param string $quotes
     *
     * @return string
     */
    function str_prepare_regex(string $string, $quotes = '/') : string
    {
        return RegEx::prepare($string, $quotes);
    }
}

if (!function_exists('str_cut_start')) {
    /**
     * Cut substring from the beginning of string
     *
     * @param string $str
     * @param string $subString
     * @param bool   $repeat
     * @param bool   $caseSensitive
     *
     * @return string
     */
    function str_cut_start(
        string $str,
        string $subString = ' ',
        bool $repeat = false,
        bool $caseSensitive = false
    ) : string {
        return Str::cutStart($str, $subString, $repeat, $caseSensitive);
    }
}

if (!function_exists('str_cut_end')) {
    /**
     * Cut substring from the end of string
     *
     * @param string $str
     * @param string $subString
     * @param bool   $repeat
     * @param bool   $caseSensitive
     *
     * @return string
     */
    function str_cut_end(
        string $str,
        string $subString = ' ',
        bool $repeat = false,
        bool $caseSensitive = false
    ) : string {
        return Str::cutEnd($str, $subString, $repeat, $caseSensitive);
    }
}

if (!function_exists('str_lower')) {
    /**
     * Convert the given string to lower-case
     *
     * @param  string $value
     *
     * @return string
     */
    function str_lower($value)
    {
        return IlluminateStr::lower($value);
    }
}

if (!function_exists('str_upper')) {
    /**
     * Convert the given string to upper-case
     *
     * @param  string $value
     *
     * @return string
     */
    function str_upper($value)
    {
        return IlluminateStr::upper($value);
    }
}

if (!function_exists('str_title')) {
    /**
     * Convert the given string to title case.
     *
     * @param  string $value
     *
     * @return string
     */
    function str_title($value)
    {
        return IlluminateStr::title($value);
    }
}

if (!function_exists('str_length')) {
    /**
     * Return the length of the given string.
     *
     * @param  string $value
     * @param  string $encoding
     *
     * @return int
     */
    function str_length($value, $encoding = null)
    {
        return IlluminateStr::length($value, $encoding);
    }
}

if (!function_exists('str_words')) {
    /**
     * Limit the number of words in a string.
     *
     * @param  string $value
     * @param  int    $words
     * @param  string $end
     *
     * @return string
     */
    function str_words($value, $words = 100, $end = '...')
    {
        return IlluminateStr::words($value, $words, $end);
    }
}

if (!function_exists('str_substr')) {
    /**
     * Returns the portion of string specified by the start and length parameters.
     *
     * @param  string   $string
     * @param  int      $start
     * @param  int|null $length
     *
     * @return string
     */
    function str_substr($string, $start, $length = null)
    {
        return IlluminateStr::substr($string, $start, $length);
    }
}

if (!function_exists('str_ucfirst')) {
    /**
     * Make a string's first character uppercase.
     *
     * @param  string  $string
     * @return string
     */
    function str_ucfirst($string)
    {
        return IlluminateStr::ucfirst($string);
    }
}

if (!function_exists('str_starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string       $haystack
     * @param  string|array $needles
     *
     * @return bool
     */
    function str_starts_with($haystack, $needles)
    {
        return IlluminateStr::startsWith($haystack, $needles);
    }
}

if (!function_exists('str_ends_with')) {
    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string       $haystack
     * @param  string|array $needles
     *
     * @return bool
     */
    function str_ends_with($haystack, $needles)
    {
        return IlluminateStr::endsWith($haystack, $needles);
    }
}

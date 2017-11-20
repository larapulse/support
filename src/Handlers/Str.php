<?php

namespace Larapulse\Support\Handlers;

class Str
{
    /**
     * Pop the character off the end of string
     *
     * @param string $str
     *
     * @return bool|string
     */
    public static function pop(string &$str)
    {
        $last = substr($str, -1);
        $str = substr($str, 0, -1);

        return $last;
    }

    /**
     * Shift a character off the beginning of string
     *
     * @param string $str
     *
     * @return bool|string
     */
    public static function shift(string &$str)
    {
        $first = substr($str, 0, 1);
        $str = substr($str, 1);

        return $first;
    }

    /**
     * Cut substring from the beginning of string
     *
     * @param string $str
     * @param string $subString
     *
     * @return string
     */
    public static function cutStart(string $str, string $subString = ' ') : string
    {
        return preg_replace('/^'. preg_quote($subString, '/') . '/', '', $str);
    }

    /**
     * Cut substring from the end of string
     *
     * @param string $str
     * @param string $subString
     *
     * @return string
     */
    public static function cutEnd(string $str, string $subString = ' ') : string
    {
        return preg_replace('/'. preg_quote($subString, '/') . '$/', '', $str);
    }
}

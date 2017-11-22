<?php

namespace Larapulse\Support\Handlers;

use Larapulse\Support\Helpers\Regex as RegexHelper;

class Str
{
    /**
     * Pop the character off the end of string
     *
     * @param string $str
     * @param string $encoding
     *
     * @return bool|string
     */
    public static function pop(string &$str, string $encoding = null)
    {
        $encoding = $encoding ?: mb_internal_encoding();

        $last = mb_substr($str, -1, null, $encoding);
        $str = mb_substr($str, 0, -1, $encoding);

        return $last;
    }

    /**
     * Shift a character off the beginning of string
     *
     * @param string $str
     * @param string $encoding
     *
     * @return bool|string
     */
    public static function shift(string &$str, string $encoding = null)
    {
        $encoding = $encoding ?: mb_internal_encoding();

        $first = mb_substr($str, 0, 1, $encoding);
        $str = mb_substr($str, 1, null, $encoding);

        return $first;
    }

    /**
     * Cut substring from the beginning of string
     *
     * @param string $str
     * @param string $subString
     * @param bool   $repeat
     * @param bool   $caseSensitive     Not working with multi-byte characters
     *
     * @return string
     */
    public static function cutStart(
        string $str,
        string $subString = ' ',
        bool $repeat = false,
        bool $caseSensitive = true
    ) : string {
        $prepared = RegEx::prepare($subString, '/');
        $regex = sprintf(
            '/^%s/%s',
            ($subString
                ? ($repeat ? RegexHelper::quantifyGroup($prepared, 0) : $prepared)
                : ''
            ),
            (!$caseSensitive ? 'i' : '')
        );

        return preg_replace($regex, '', $str);
    }

    /**
     * Cut substring from the end of string
     *
     * @param string $str
     * @param string $subString
     * @param bool   $repeat
     * @param bool   $caseSensitive     Not working with multi-byte characters
     *
     * @return string
     */
    public static function cutEnd(
        string $str,
        string $subString = ' ',
        bool $repeat = false,
        bool $caseSensitive = true
    ) : string {
        $prepared = RegEx::prepare($subString, '/');
        $regex = sprintf(
            '/%s$/%s',
            ($subString
                ? ($repeat ? RegexHelper::quantifyGroup($prepared, 0) : $prepared)
                : ''
            ),
            (!$caseSensitive ? 'i' : '')
        );

        return preg_replace($regex, '', $str);
    }
}

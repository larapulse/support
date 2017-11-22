<?php

namespace Larapulse\Support\Helpers;

class Regex
{
    public static function quantifyGroup(string $str, $min = null, $max = INF, string $tag = null) : string
    {
        $tag = $tag ? "?<{$tag}>" : '';

        return "({$tag}{$str})".self::fetchQuantifier($min, $max);
    }

    /**
     * Build quantifier from parameters
     *
     * @param int|null  $min
     * @param float|int $max
     * @param bool      $lazyLoad
     *
     * @return string
     */
    public static function fetchQuantifier($min = null, $max = INF, bool $lazyLoad = false) : string
    {
        $lazy = $lazyLoad ? '?' : '';

        switch (true) {
            case ($min === 0 && $max === 1):
                return '?'.$lazy;
            case ($min === 0 && $max === INF):
                return '*'.$lazy;
            case ($min === 1 && $max === INF):
                return '+'.$lazy;
            case (is_int($min) && $min >= 1 && $max === null):
                return '{'.$min.'}'.$lazy;
            case (is_int($min) && (is_int($max) || $max === INF)):
                $max = is_int($max) ? $max : '';
                return '{'.$min.','.$max.'}'.$lazy;
            default:
                return '';
        }
    }
}

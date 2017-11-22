<?php

namespace Larapulse\Support\Handlers;

class RegEx
{
    const REGEX_CHARS_REPLACEMENT = [
        " "     => '\s',
        "\t"    => '\t',
        "\n"    => '\n',
        "\f"    => '\f',
        "\r"    => '\r',
        "\v"    => '\v',
        // "\h"    => '\h',
        // "\R"    => '\R',
    ];

    /**
     * Validate if RegEx statement is valid
     *
     * @param string $regexStatement
     *
     * @return bool
     */
    public static function isValid(string $regexStatement) : bool
    {
        return @preg_match($regexStatement, null) !== false;
    }

    /**
     * Prepare string to be safety used in regex
     *
     * @param string $string
     * @param string $quotes
     *
     * @return string
     */
    public static function prepare(string $string, $quotes = '/') : string
    {
        $string = $quotes ? preg_quote($string, $quotes) : $string;

        return str_replace(
            array_keys(self::REGEX_CHARS_REPLACEMENT),
            array_values(self::REGEX_CHARS_REPLACEMENT),
            $string
        );
    }
}

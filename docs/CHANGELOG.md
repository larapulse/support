# Changelog

All notable changes to `larapulse/support` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## 2017-11-22

### Added
- `Larapulse\Support\Handlers\RegEx` to work with Regular Expressions
- Init `Larapulse\Support\Helpers\RegEx` to generate Regular Expressions 
- Unit tests for `Larapulse\Support\Handlers\Str` class
- Unit tests for `Larapulse\Support\Handlers\Regex` class
- Unit tests for `Larapulse\Support\Helpers\Regex` class
- Unit tests for array and string functions

### Changed
- `Larapulse\Support\Handlers\Str::pop()` add `encoding` attribute
- `Larapulse\Support\Handlers\Str::shift()` add `encoding` attribute
- `Larapulse\Support\Handlers\Str::cutStart()` add `repeat` and `caseSensitive` attributes
- `Larapulse\Support\Handlers\Str::cutEnd()` add `repeat` and `caseSensitive` attributes

### Removed
- Array functions: `array_only`, `array_head`, `array_last`

## 2017-11-21

### Added
- Unit tests for `Larapulse\Support\Handlers\Arr` class

### Changed
- `array_flatten`, `array_flatten_assoc` function not flatten array, if wrong depth defined

## 2017-11-20

### Added
- `Larapulse\Support\Handlers\Arr` class
- `Larapulse\Support\Handlers\Str` class
- `Larapulse\Support\Helpers\DataTypes` class
- Array functions: `array_flatten`, `array_flatten_assoc`, `array_depth`, `is_array_of_type`, `is_array_of_types`, `is_array_of_instance`, `array_is_assoc`, `array_only`, `array_head`, `array_last`
- String functions: `str_pop`, `str_shift`, `str_cut_start`, `str_cut_end`, `str_lower`, `str_upper`, `str_title`, `str_length`, `str_words`, `str_substr`, `str_ucfirst`, `str_starts_with`, `str_ends_with`
- Unit tests for `Larapulse\Support\Handlers\Arr` class

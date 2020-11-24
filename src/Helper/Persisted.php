<?php

declare(strict_types=1);

namespace App\Helper;


class Persisted
{
    private static $persistedArray = [];

    public static function has(string $val): bool
    {
        return in_array($val, self::$persistedArray);
    }

    public static function add(string $val, string $key = null): void
    {
        if (!self::has($val)) {
            $key === null ? self::$persistedArray[] = $val : self::$persistedArray[$key] = $val;
            self::$persistedArray = array_unique(self::$persistedArray, SORT_STRING);
        }
    }

    public static function search(string $val)
    {
        return array_search($val, self::$persistedArray);
    }

    public static function getAll()
    {
        return self::$persistedArray;
    }
}
<?php

declare(strict_types=1);

namespace App\Helper;


class CSV
{
    public static function getLinesFromFile(string $csvFile)
    {
        file_put_contents($csvFile, PHP_EOL, FILE_APPEND);

        $csvLines = str_replace(
            'http://rukzaki.in.ua/download/images',
            '/home/rukzaki/public_html/download/images',
            @file($csvFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
        );

        $csvArray = [];

        foreach ($csvLines as $line_) {
            $csvArray[] = str_getcsv($line_, ';');
        }

        return $csvArray;
    }

    public static function getFieldsFromString(string $str_)
    {
        return str_getcsv($str_, ',');
    }
}
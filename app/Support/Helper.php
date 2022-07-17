<?php

namespace App\Support;

class Helper
{
    /**
     * Human readable file size.
     *
     * @see https://stackoverflow.com/a/23888858/2732184
     *
     * @param int $bytes File size
     * @param int $dec   Decimal places
     *
     * @return string
     */
    public static function human_filesize($bytes, $dec = 2)
    {
        if (! $bytes) {
            return '';
        }

        $size   = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)).@$size[$factor];
    }

    /**
     * Convert string to float.
     *
     * @see https://stackoverflow.com/a/19764699/2732184
     *
     * @param string $money
     *
     * @return float
     */
    public static function to_float($money)
    {
        $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
        $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

        $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

        $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
        $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '', $stringWithCommaOrDot);

        return (float) str_replace(',', '.', $removedThousandSeparator);
    }
}

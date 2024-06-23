<?php

namespace app\services\Support;

use app\services\Support\Contracts\SupportServiceInterface;

class SupportService implements SupportServiceInterface
{
    public const SPACE_SYMBOL = ' ';
    public const  ELLIPSIS_SYMBOL = '...';

    public static function formatDate(string $date): string
    {
        if ($ts = strtotime($date)) {
            $month = strtolower(date('F', $ts));
            $day = date('d', $ts);
            $year = date('Y', $ts);

            $translated_month = match ($month) {
                'january'   => 'Января',
                'february'  => 'Февраля',
                'march'     => 'Марта',
                'april'     => 'Апреля',
                'may'       => 'Мая',
                'june'      => 'Июня',
                'july'      => 'Июля',
                'august'    => 'Августа',
                'september' => 'Сентября',
                'october'   => 'Октября',
                'november'  => 'Ноября',
                'december'  => 'Декабря',
            };

            return "$day $translated_month $year";
        }

        return $date;
    }

    public static function cropTextContent(string $text, int $length = 300): string
    {
        $text = trim($text);
        $countChars = mb_strlen($text);

        if ($countChars > $length) {
            $originTextSymbols = $textSymbols = mb_str_split($text);

            while ($countChars > $length) {
                array_pop($textSymbols);
                $countChars--;
            }

            if ($originTextSymbols[$countChars] == self::SPACE_SYMBOL) {
                $textSymbols[$countChars]  = self::ELLIPSIS_SYMBOL;
            } else {
                while ($textSymbols[array_key_last($textSymbols)] != self::SPACE_SYMBOL) {
                    array_pop($textSymbols);
                }
                $textSymbols[array_key_last($textSymbols)]  = self::ELLIPSIS_SYMBOL;
            }

            return implode('', $textSymbols);
        }

        return $text;
    }
}

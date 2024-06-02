<?php

namespace app\services\Support;

use app\services\Support\Contracts\SupportServiceInterface;

class SupportService implements SupportServiceInterface
{
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
}

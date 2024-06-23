<?php

namespace app\services\Support\Contracts;


interface SupportServiceInterface
{
    public static function formatDate(string $date): string;
    public static function cropTextContent(string $text, int $length = 300): string;
}

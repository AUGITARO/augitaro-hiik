<?php

namespace app\services\Vacancy\Contracts;

use app\models\Vacancy\VacancyStoreForm;

interface VacancyServiceInterface
{
    public function create(VacancyStoreForm $vacancyForm): bool;

    public function findVacancies(int $count): array;
}

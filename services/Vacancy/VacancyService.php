<?php

namespace app\services\Vacancy;

use app\models\Vacancy\Vacancy;
use app\models\Vacancy\VacancyStoreForm;
use app\services\Vacancy\Contracts\VacancyServiceInterface;
use Yii;

class VacancyService implements VacancyServiceInterface
{
    public function create(VacancyStoreForm $vacancyForm): bool
    {
        $vacancy = new Vacancy();

        $vacancy->title = $vacancyForm->title;
        $vacancy->description = $vacancyForm->description;
        $vacancy->date = $vacancyForm->date;
        $vacancy->email = $vacancyForm->email;
        $vacancy->tel = $vacancyForm->tel;
        $vacancy->address = $vacancyForm->address;
        $vacancy->user_id = Yii::$app->user->id;

        $vacancy->save();

        return $vacancy->save();
    }

    public function findVacancies(int $count): array
    {
        return Vacancy::find()
            ->limit($count)
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }
}
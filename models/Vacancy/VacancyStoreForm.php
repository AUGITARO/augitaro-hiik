<?php

namespace app\models\Vacancy;

use yii\base\Model;

class VacancyStoreForm extends Model
{
    use VacancyTrait;

    public $title;
    public $description;
    public $date;
    public $email;
    public $tel;
    public $address;

    public function rules(): array
    {
        return $this->getRules();
    }
}

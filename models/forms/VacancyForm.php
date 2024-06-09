<?php

namespace app\models\forms;

use app\models\User;
use app\models\Vacancy;
use yii\base\Model;

class VacancyForm extends Model
{
    public $title;
    public $description;
    public $date;

    public function rules(): array
    {
        return [
            ['title', 'trim'],
            ['title', 'required'],
            ['title', 'string'],
            ['title', 'unique', 'targetClass' => Vacancy::class, 'targetAttribute' => 'title'],

            ['description', 'trim'],
            ['description', 'required'],
            ['description', 'string'],

            ['date', 'date'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'string'],
        ];
    }
}

<?php

namespace app\models\Vacancy;

use yii\base\Model;

class VacancyStoreForm extends Model
{
    public $title;
    public $description;
    public $date;
    public $email;
    public $tel;
    public $address;

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

            ['date', 'trim'],
            ['date', 'required'],
            ['date', 'string'],
            ['date', 'date', 'format' => 'php:Y-m-d'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'string'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => Vacancy::class, 'targetAttribute' => 'email'],

            ['tel', 'trim'],
            ['tel', 'required'],
            ['tel', 'string'],

            ['address', 'trim'],
            ['address', 'required'],
            ['address', 'string'],
        ];
    }
}

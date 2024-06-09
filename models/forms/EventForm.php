<?php

namespace app\models\forms;

use app\models\Event;
use yii\base\Model;

class EventForm extends Model
{
    public $title;
    public $description;
    public $date;
    public $imageFile;

    public function rules(): array
    {
        return [
            ['title', 'trim'],
            ['title', 'required'],
            ['title', 'string'],
            ['title', 'unique', 'targetClass' => Event::class, 'targetAttribute' => 'title'],

            ['description', 'trim'],
            ['description', 'required'],
            ['description', 'string'],

            ['date', 'trim'],
            ['date', 'required'],
            ['date', 'string'],
            ['date', 'date', 'format' => 'php:Y-m-d'],

            ['imageFile', 'required'],
            ['imageFile', 'image', 'extensions' => 'png, jpg'],
        ];
    }
}
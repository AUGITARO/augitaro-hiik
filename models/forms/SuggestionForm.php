<?php

namespace app\models\forms;

use yii\base\Model;

class SuggestionForm extends Model
{
    public $username;
    public $email;
    public $message;

    public function rules(): array
    {
        return [

            ['username', 'trim'],
            ['username', 'required', 'message' => 'Обязательно для заполнения'],
            ['username', 'string'],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Обязательно для заполнения'],
            ['email', 'string'],
            ['email', 'email', 'message' => 'Почта написана неправильно'],

            ['message', 'trim'],
            ['message', 'required', 'message' => 'Обязательно для заполнения'],
            ['message', 'string'],
        ];
    }
}
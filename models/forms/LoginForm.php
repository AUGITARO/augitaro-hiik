<?php

namespace app\models\forms;

use yii\base\Model;
use app\models\User;

class LoginForm extends Model
{
    public $login;
    public $password;

    const ERROR_MESSAGE = 'Логин или пароль неправильный';

    public function rules(): array
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'string'],

            ['password', 'trim'],
            ['password', 'required'],
            ['password', 'string'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params): void
    {
        if (!$this->hasErrors()) {
            $user = User::findOne(['login' => $this->login]);
            if (!$user || !$user->validatePasswordHash($this->password)) {
                $this->addError($attribute, self::ERROR_MESSAGE);
            }
        }
    }
}
<?php

namespace app\models\forms;

use app\models\Token;
use app\models\User;
use yii\base\Model;

class SignupForm extends Model
{
    public $login;
    public $password;
    public $password_repeat;
    public $token;

    public function rules(): array
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'string'],
            ['login', 'unique', 'targetClass' => User::class, 'targetAttribute' => 'login'],

            ['password', 'trim'],
            ['password', 'required'],
            ['password', 'string'],
            ['password', 'compare', 'compareAttribute' => 'password_repeat'],

            ['password_repeat', 'trim'],
            ['password_repeat', 'required'],
            ['password_repeat', 'string'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],

            ['token', 'trim'],
            ['token', 'required'],
            ['token', 'string'],
            ['token', 'exist', 'targetClass' => Token::class, 'targetAttribute' => 'token']
        ];
    }
}
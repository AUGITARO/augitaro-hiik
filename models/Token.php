<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\log\Target;

/**
 * This is the model class for table "token".
 *
 * @property int $id
 * @property string $created_at
 * @property string $token
 */
class Token extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{token}}';
    }

    public function rules(): array
    {
        return [
            ['token', 'trim'],
            ['token', 'required'],
            ['token', 'string'],
            ['token', 'unique', 'targetClass' => Token::class, 'targetAttribute' => 'token'],
        ];
    }
}

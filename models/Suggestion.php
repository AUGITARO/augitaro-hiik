<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "suggestion".
 *
 * @property int $id
 * @property string $created_at
 * @property string $username
 * @property string $email
 * @property string $message
 */
class Suggestion extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{suggestion}}';
    }

    public function rules(): array
    {
        return [
                ['username', 'trim'],
                ['username', 'required'],
                ['username', 'string'],

                ['email', 'trim'],
                ['email', 'required'],
                ['email', 'string', 'max' => 128],
                ['email', 'email'],

                ['message', 'string'],
                ['message', 'required'],
        ];
    }
}

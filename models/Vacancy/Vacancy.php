<?php

namespace app\models\Vacancy;

use app\models\User;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $created_at
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property int $date
 * @property string $email
 * @property string $tel
 * @property string $address
 */
class Vacancy extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{vacancy}}';
    }

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

            ['user_id', 'required'],
            ['user_id', 'integer'],
            ['user_id', 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],
        ];
    }
}

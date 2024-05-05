<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $created_at
 * @property string $title
 * @property string $description
 * @property string $date
 * @property string $image_path
 * @property int $user_id
 */
class Event extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{event}}';
    }

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

            ['date', 'date', 'format' => 'php:Y-m-d'],

            ['image_path', 'trim'],
            ['image_path', 'required'],
            ['image_path', 'string'],

            ['user_id', 'required'],
            ['user_id', 'integer'],
            ['user_id', 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],
        ];
    }
}

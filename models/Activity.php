<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $created_at
 * @property int $user_id
 * @property string $activity_name
 */
class Activity extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{activity}}';
    }

    public function rules(): array
    {
        return [
            ['user_id', 'required'],
            ['user_id', 'integer'],
            ['user_id', 'exist'],

            ['activity_name', 'trim'],
            ['activity_name', 'required'],
            ['activity_name', 'string'],
        ];
    }
}

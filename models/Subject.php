<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $created_at
 * @property int $activity_id
 * @property int $user_id
 * @property string $subject_name
 */
class Subject extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{subject}}';
    }

    public function rules(): array
    {
        return [
            ['activity_id', 'required'],
            ['activity_id', 'integer'],
//            ['activity_id', 'exist'],

            ['user_id', 'required'],
            ['user_id', 'integer'],
//            ['user_id', 'exist'],
            
            ['subject_name', 'trim'],
            ['subject_name', 'required'],
            ['subject_name', 'string'],
        ];
    }
}

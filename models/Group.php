<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string $created_at
 * @property int $course_id
 * @property int $speciality_id
 * @property int $user_id
 * @property int $group_number
 */
class Group extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{group}}';
    }

    public function rules(): array
    {
        return [
            ['course_id', 'required'],
            ['course_id', 'integer'],
//            ['course_id', 'exist'],

            ['speciality_id', 'required'],
            ['speciality_id', 'integer'],
//            ['speciality_id', 'exist'],


            ['user_id', 'required'],
            ['user_id', 'integer'],
//            ['user_id', 'exist'],

            ['group_number', 'required'],
            ['group_number', 'integer'],
        ];
    }
}

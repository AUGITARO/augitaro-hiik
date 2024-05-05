<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $created_at
 * @property int $course_number
 */
class Course extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{course}}';
    }

    public function rules(): array
    {
        return [
            ['course_number', 'required'],
            ['course_number', 'integer'],
        ];
    }
}

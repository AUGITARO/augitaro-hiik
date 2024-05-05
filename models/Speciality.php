<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "speciality".
 *
 * @property int $id
 * @property string $created_at
 * @property string $speciality_name
 */
class Speciality extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{speciality}}';
    }

    public function rules(): array
    {
        return [
            ['speciality_name', 'trim'],
            ['speciality_name', 'required'],
            ['speciality_name', 'string'],
        ];
    }
}

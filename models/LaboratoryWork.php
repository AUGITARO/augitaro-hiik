<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "laboratory_work".
 *
 * @property int $id
 * @property string $created_at
 * @property int $subject_id
 * @property int $user_id
 * @property string $file_path
 */
class LaboratoryWork extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{laboratory_work}}';
    }

    public function rules(): array
    {
        return [
            ['subject_id', 'required'],
            ['subject_id', 'integer'],
//            ['subject_id', 'exist'],

            ['user_id', 'required'],
            ['user_id', 'integer'],
//            ['user_id', 'exist'],

            ['file_path', 'required'],
            ['file_path', 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }
}

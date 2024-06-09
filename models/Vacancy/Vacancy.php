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
    use VacancyTrait;

    public static function tableName(): string
    {
        return '{{vacancy}}';
    }

    public function rules(): array
    {
        return array_merge(
            [
                ['user_id', 'required'],
                ['user_id', 'integer'],
                ['user_id', 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id']
            ],
            $this->getRules(),
        );
    }
}

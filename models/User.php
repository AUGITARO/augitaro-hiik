<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $created_at
 * @property string $login
 * @property string $password_hash
 */
class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName(): string
    {
        return '{{user}}';
    }

    public function rules(): array
    {
        return [
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'string'],
            ['login', 'unique', 'targetClass' => User::class, 'targetAttribute' => 'login'],

            ['password_hash', 'trim'],
            ['password_hash', 'required'],
            ['password_hash', 'string'],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
    }
    public function validateAuthKey($authKey)
    {
    }

    public function validatePasswordHash(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}

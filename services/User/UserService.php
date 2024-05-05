<?php

namespace app\services\User;

use app\models\User;
use app\models\forms\SignupForm;
use app\services\Token\TokenService;
use app\services\User\Contracts\UserServiceInterface;
use Yii;

class UserService implements UserServiceInterface
{
    public function create(SignupForm $model): void
    {
        $transaction = User::getDb()->beginTransaction();

        $user = new User();
        $user->login = $model->login;
        $user->password_hash = Yii::$app->security->generatePasswordHash($model->password);

        if ($user->save()) {
            (new TokenService())->delete($model->token);
            $transaction->commit();
        }

        $transaction->rollBack();
    }
}

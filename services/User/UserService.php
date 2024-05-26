<?php

namespace app\services\User;

use app\models\User;
use app\models\forms\SignupForm;
use app\services\Token\TokenService;
use app\services\User\Contracts\UserServiceInterface;
use Throwable;
use Yii;
use yii\db\Exception;
use yii\db\StaleObjectException;

class UserService implements UserServiceInterface
{
    /**
     * @throws Exception
     * @throws Throwable
     * @throws StaleObjectException
     * @throws \yii\base\Exception
     */
    public function create(SignupForm $signupForm): bool
    {
        $transaction = User::getDb()->beginTransaction();

        $user = new User();
        $user->login = $signupForm->login;
        $user->password_hash = Yii::$app->security->generatePasswordHash($signupForm->password);

        if ($user->save()) {
            (new TokenService())->delete($signupForm->token);
            $transaction->commit();
            return true;
        }

        $transaction->rollBack();
        return false;
    }
}

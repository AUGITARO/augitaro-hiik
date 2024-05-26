<?php

namespace app\services\Token;

use app\models\Token;
use app\services\Token\Contracts\TokenServiceInterface;
use Throwable;
use Yii;
use yii\base\Exception;
use yii\db\StaleObjectException;

class TokenService implements TokenServiceInterface
{
    /**
     * @throws Exception
     */
    public function createMany(int $count): int
    {
        for ($i = 1; $i <= $count; $i++) {
            $this->createOne();
        }

        return $count;
    }

    /**
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function delete(string $token): bool
    {
        $token = Token::findOne(['token' => $token]);
        return $token->delete();
    }

    /**
     * @throws Exception
     */
    protected function createOne(): bool
    {
        $token = new Token();
        $token->token = Yii::$app->security->generateRandomString();
        return $token->save();
    }
}

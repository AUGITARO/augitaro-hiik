<?php

namespace app\services\Token;

use app\models\Token;
use app\services\Token\Contracts\TokenServiceInterface;
use Yii;

class TokenService implements TokenServiceInterface
{
    public function createMany(int $count): int
    {
        for ($i = 1; $i <= $count; $i++) {
            $this->createOne();
        }

        return $count;
    }

    public function delete(string $token): bool
    {
        $token = Token::findOne(['token' => $token]);
        return $token->delete();
    }

    protected function createOne(): bool
    {
        $token = new Token();
        $token->token = Yii::$app->security->generateRandomString();
        return $token->save();
    }
}


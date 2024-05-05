<?php

namespace app\commands;

use app\services\Token\TokenService;
use yii\console\Controller;
use yii\console\ExitCode;

class TokenController extends Controller
{
    public function actionGenerate(int $count): int
    {
        $resultCount = (new TokenService())->createMany($count);
        print "Вы успешно создали $resultCount токенов";

        return ExitCode::OK;
    }
}

<?php

namespace app\services\User\Contracts;

use app\models\forms\SignupForm;

interface UserServiceInterface
{
    public function create(SignupForm $signupForm): bool;
}

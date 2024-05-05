<?php

namespace app\services\Token\Contracts;

interface TokenServiceInterface
{
    public function createMany(int $count): int;
    public function delete(string $token): bool;
}

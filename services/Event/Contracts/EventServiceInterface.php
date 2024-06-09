<?php

namespace app\services\Event\Contracts;

use app\models\forms\EventForm;

interface EventServiceInterface
{
    public function create(EventForm $eventForm): bool;

    public function findEvents(int $count): array;
}

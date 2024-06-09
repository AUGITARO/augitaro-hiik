<?php

namespace app\services\Event;

use app\models\Event;
use app\models\forms\EventForm;
use app\services\Event\Contracts\EventServiceInterface;
use Yii;

class EventService implements EventServiceInterface
{
    public function create(EventForm $eventForm): bool
    {
        $event = new Event();
        $event->title = $eventForm->title;
        $event->description = $eventForm->description;
        $event->date = $eventForm->date;
        $event->user_id = Yii::$app->user->id;

        $fileName = uniqid("{$eventForm->imageFile->baseName}_") . '.' . $eventForm->imageFile->extension;
        $eventForm->imageFile->saveAs('uploads/event/' . $fileName);
        $event->image_path = $fileName;

        return $event->save();
    }

    public function findEvents(int $count): array
    {
        return Event::find()
            ->limit($count)
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }
}

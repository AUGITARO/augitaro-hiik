<?php

namespace app\services\Event;

use app\models\Event;
use app\models\forms\EventForm;
use app\services\Event\Contracts\EventServiceInterface;
use Yii;

class EventService implements EventServiceInterface
{
    public function create(EventForm $model): bool
    {
        $event = new Event();
        $event->title = $model->title;
        $event->description = $model->description;
        $event->date = $model->date;
        $event->user_id = Yii::$app->user->id;

        $fileName = uniqid("{$model->imageFile->baseName}_") . '.' . $model->imageFile->extension;
        $model->imageFile->saveAs('uploads/event/' . $fileName);
        $event->image_path = $fileName;

        return $event->save();
    }
}

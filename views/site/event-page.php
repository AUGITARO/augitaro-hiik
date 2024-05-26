<?php

/** @var yii\web\view $this */
/** @var Event $event */

use app\models\Event;
use yii\helpers\Html;

$this->title = $event->title;

?>
<section class="event-page">
    <div class="container">
        <img
            src="uploads/event/<?= Html::encode($event->image_path) ?>"
            width="1500"
            height="700"
            alt="<?= Html::encode($event->title) ?>"
        >
        <div class="event-page-news">
            <h3><?= Html::encode($event->title) ?></h3>
            <div class="news-text">
                <p><?= Html::encode($event->description) ?></p>
            </div>
        </div>
    </div>
</section>

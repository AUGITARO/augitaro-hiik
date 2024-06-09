<?php

/** @var yii\web\view $this */
/** @var array $vacancies */
/** @var int $newCount */

use app\services\Support\SupportService;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Community | Вакансии';

?>
<section class="vacancies">
    <div class="container">

        <?php if (empty($vacancies)): ?>
            <h1>Увы. Вакансий нет</h1>
        <?php else: ?>
            <h1>Вакансии</h1>
        <?php endif; ?>

        <ul class="vacancy-list">

            <?php foreach ($vacancies as $vacancy): ?>
                <li class="vacancy-list-item">
                    <a href="<?= Url::to(['site/vacancy-page', 'id' => $vacancy->id])?>">
                        <h3><?= Html::encode($vacancy->title) ?></h3>
                        <time class="tag">Вакансия <?= SupportService::formatDate($vacancy->date) ?></time>
                        <p><?= Html::encode($vacancy->description) ?></p>
                        <b>Читать подробнее</b>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>

        <a class="big-button" href="<?= Url::to(['site/vacancy', 'count' => $newCount])?>">Смотреть больше</a>
    </div>
</section>

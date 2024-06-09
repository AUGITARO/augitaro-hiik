<?php

/** @var yii\web\view $this */
/** @var Vacancy $vacancy */

use app\models\vacancy;
use yii\helpers\Html;

$this->title = $vacancy->title;

?>

<article class="vacancy">
    <div class="container">
        <h1><?= Html::encode($vacancy->title) ?></h1>
        <div class="row">
            <h2 class="visually-hidden"></h2>
            <div class="col">
                <h3 class="visually-hidden"></h3>
                <p><?= Html::encode($vacancy->description) ?></p>
            </div>

            <div class="col">
                <h3>Контакты</h3>
                <dl>
                    <div>
                        <dt>E-mail</dt>
                        <dd><a href="mailto:tutbudetemail@gmail.com"><?= Html::encode($vacancy->email) ?></a></dd>
                    </div>
                    <div>
                        <dt>Телефон</dt>
                        <dd><a href="tel:<?= Html::encode($vacancy->tel) ?>"><?= Html::encode($vacancy->tel) ?></a></dd>
                    </div>
                    <div>
                        <dt>Адрес</dt>
                        <dd><?= Html::encode($vacancy->address) ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</article>


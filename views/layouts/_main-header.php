<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

?>
<header class="main-header">
    <div class="container">
        <nav>
            <a class="logo" href="<?= Url::to(['site/index']) ?>">
                <img src="./img/logo.svg" width="" height="" alt="logo">
            </a>
            <ul class="nav-list">
                <li class="nav-list-item">
                    <a class="nav-link" href="<?= Url::to(['site/index']) ?>">Главная</a>
                </li>
                <li class="nav-list-item">
                    <a class="nav-link" href="<?= Url::to(['site/activity']) ?>">Деятельность вне занятий</a>
                </li>
                <li class="nav-list-item">
                    <a class="nav-link" href="<?= Url::to(['site/vacancy']) ?>">Вакансии</a>
                </li>
                <li class="nav-list-item">
                    <a class="nav-link" href="<?= Url::to(['site/events']) ?>">Мероприятия</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

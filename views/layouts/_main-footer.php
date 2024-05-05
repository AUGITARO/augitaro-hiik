<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

?>
<footer class="main-footer">
    <div class="container">
        <a class="logo-link" href="<?= Url::to(['site/index']) ?>">
            <img src="./img/logo-white.png" width="83" height="48" alt="logo">
        </a>
        <div class="inner-container">
            <div class="row">
                <ul class="nav-list">
                    <li class="nav-list-item"><a href="./index.html">Главная</a></li>
                    <li class="nav-list-item"><a href="./vacancy.html">Вакансии</a></li>
                    <li class="nav-list-item"><a href="./schedule.html">Расписание</a></li>
                    <li class="nav-list-item"><a href="./events.html">Мероприятия</a></li>
                    <li class="nav-list-item"><a href="./activity.html">Деятельность вне занятий</a></li>
                </ul>
                <ul class="social-list">
                    <li class="social-list-item">
                        <a href="#">
                            <img src="./img/icons/tg.svg" width="50" height="50" alt="tg-group">
                        </a>
                    </li>
                    <li class="social-list-item">
                        <a href="#">
                            <img src="./img/icons/vk.svg" width="50" height="50" alt="vk-group">
                        </a>
                    </li>
                </ul>
            </div>
            <a
                class="work-email"
                href="mailto:communityhiik@gmail.com"
            >communityhiik@gmail.com</a>
        </div>
    </div>
</footer>
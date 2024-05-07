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
                    <li class="nav-list-item"><a href="<?= Url::to(['site/index']) ?>">Главная</a></li>
                    <li class="nav-list-item"><a href="<?= Url::to(['site/vacancy']) ?>">Вакансии</a></li>
                    <li class="nav-list-item"><a href="./schedule.html">Расписание(Недоступно)</a></li>
                    <li class="nav-list-item"><a href="<?= Url::to(['site/events']) ?>">Мероприятия</a></li>
                    <li class="nav-list-item"><a href="<?= Url::to(['site/activity']) ?>">Деятельность вне занятий</a></li>
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
                <?php if(!Yii::$app->user->isGuest): ?>
                    <div class="admin-info">
                        <p>Admin name:</p>
                        <span><?= Yii::$app->user->identity->login ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <a
                class="work-email"
                href="mailto:communityhiik@gmail.com"
            >communityhiik@gmail.com</a>
        </div>
    </div>
</footer>
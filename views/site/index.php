<?php

/** @var yii\web\view $this */
/** @var Event $events */

use app\models\Event;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Community | Главная';

?>

<section class="intro">
    <div class="container">
        <h1>
            <span class="fs-test">Сообщество</span>
            <span class="fs-test">Студентов</span>
        </h1>
        <h2 class="visually-hidden"></h2>
    </div>
</section>

<section class="about">
    <div class="container">
        <p>О сайте</p>
        <h2>
            Наш сайт предназначен для улучшения студенческой жизни и повышения качества обучения.<br>
            Он предоставляет различные функции и возможности,
            которые помогают студентам организоваться и достичь желаемого результата в институте и техникуме
        </h2>
    </div>
</section>

<section class="tabs">
    <div class="container">
        <h2 class="visually-hidden"></h2>
        <ol>
            <li>
                <a class="tab" href="./schedule.html">
                    <p class="tab-desc">
                        расписание - студенты могут легко просматривать свое расписание на неделю,
                        включая время и место проведения занятий. Это позволяет им быть в курсе и не пропускать важные пары.
                    </p>
                    <span>Перейти в раздел</span>
                </a>
            </li>
            <li>
                <a class="tab" href="<?= Url::to(['site/activity']) ?>">
                    <p class="tab-desc">
                        деятельность вне занятий - в этом разделе студенты могут выбрать интересующие их направления,
                        такие как спорт, искусство, наука, а так же найти нужные академические материалы.
                    </p>
                    <span>Перейти в раздел</span>
                </a>
            </li>
            <li>
                <a class="tab" href="<?= Url::to(['site/vacancy']) ?>">
                    <p class="tab-desc">
                        вакансии – это также особый раздел нашего сайта.
                        Здесь студенты могут найти информацию о вакансиях, стажировках и других возможностях для их будущей карьеры.
                    </p>
                    <span>Перейти в раздел</span>
                </a>
            </li>
            <li>
                <a class="tab" href="<?= Url::to(['site/events']) ?>">
                    <p class="tab-desc">
                        мероприятия -студенты могут узнавать о предстоящих академических, спортивных, культурных и развлекательных мероприятиях в колледже.
                        Это дает им возможность быть в курсе всех интересных событий и принимать в них участие.
                    </p>
                    <span>Перейти в раздел</span>
                </a>
            </li>
        </ol>
    </div>
</section>

<section class="relevant-news">
    <div class="container">
        <h2 class="actual">Актуальное</h2>
        <ul class="news-tab-list">

            <?php foreach ($events as $event): ?>
                <li>
                    <a class="news-tab" href="./events-page.html">
                        <h3 class="news-tab-text"><?= Html::encode($event->title) ?></h3>
                        <img src="uploads/event/<?= Html::encode($event->image_path) ?>" alt="<?= Html::encode($event->title) ?>">
                        <time class="tag"><?= date('Y F d', strtotime($event->date)) ?></time>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
        <a class="big-button" href="<?= Url::to(['site/events']) ?>">Смотреть больше</a>
    </div>
</section>

<section class="feedback-form">
    <div class="container">
        <h2>Есть идея или&nbsp;объявление?</h2>
        <p>Если у вас есть идея или интересное предложение, то&nbsp;оставьте нам сообщение и мы его рассмотрим</p>
        <form
            action=""
            method="post"
            enctype="application/x-www-form-urlencoded"
            autocomplete="off"
            novalidate
        >
            <div class="form-group">
                <div class="error">Введите Имя</div>
                <input
                    class="input-class"
                    type="text"
                    name=""
                    value=""
                    placeholder="Имя"
                    required
                >
            </div>
            <div class="form-group">
                <div class="error">Такой e-mail не существует или он написан некорректно</div>
                <input
                    class="input-class"
                    type="text"
                    name=""
                    value=""
                    placeholder="Почта"
                    required
                >
            </div>
            <div class="form-group">
                <div class="error">Введите сообщение</div>
                <textarea
                    name=""
                    placeholder="Сообщение"
                    required
                ></textarea>
            </div>
            <input class="big-button" type="submit" value="Оставить сообщение">
        </form>
    </div>
</section>

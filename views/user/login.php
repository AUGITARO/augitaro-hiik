<?php

/** @var yii\web\View $this */
/** @var app\models\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Log-Admin';

?>

<section class="login">
    <div class="container">
        <div class="form_container">
            <?php $form = ActiveForm::begin([
                'action' => Url::to(['user/login']),
                'method' => 'post',
                'enableAjaxValidation' => false,
                'options' => [
                    'class' => '',
                    'enctype' => 'application/x-www-form-urlencoded',
                    'novalidate' => true,
                    'autocomplete' => 'off',
                ],
                'fieldConfig' => [
                    'options' => ['class' => 'form_group'],
                    'inputOptions' => ['class' => 'form_input'],
//                  'labelOptions' => ['class' => ''],
                    'errorOptions' => ['class' => 'error_form'],
                    'template' => '{input}{error}',
                ]
            ]); ?>

                <h1 class="h1-form">Авторизация</h1>

                <?= $form->field($model, 'login')->textInput(['placeholder' => 'Логин']) ?>
                <?= $form->field($model, 'password')->input('password', ['placeholder' => 'Пароль']) ?>

                <?= Html::submitInput('Вход', ['class' => 'form_button']) ?>

            <?php ActiveForm::end(); ?>
            <a class="But" href="<?= Url::to(['user/signup'])?>">Создать аккаунт администратора</a>
        </div>
    </div>
</section>

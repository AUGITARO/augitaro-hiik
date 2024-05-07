<?php

/** @var yii\web\View $this */
/** @var app\models\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Log-Admin';

?>

<section>
    <div class="container">
        <div class="form_container">
                <?php $form = ActiveForm::begin([
                    'action' => Url::to(['user/login']),
                    'method' => 'post',
                    'enableAjaxValidation' => false,
                    'options' => [
                        'class' => 'form',
                        'enctype' => 'application/x-www-form-urlencoded',
                        'novalidate' => true,
                        'autocomplete' => 'off',
                    ],
                    'fieldConfig' => [
                        'options' => ['class' => 'form_group'],
                        'inputOptions' => ['class' => 'form_input'],
                        'labelOptions' => ['class' => 'form_label'],
//                        'errorOptions' => ['class' => ''],
                        'template' => '{label}{input}',
                    ]
                ]); ?>

                <h1 class="form_title">Bxoд</h1>

                <?= $form->field($model, 'login')->textInput() ?>
                <?= $form->field($model, 'password')->input('password') ?>

                <?= Html::submitInput('Вход', ['class' => 'form_button']) ?>

                <?php ActiveForm::end(); ?>
            <div>
        </div>
    </div>
</section>

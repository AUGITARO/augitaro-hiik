<?php

/** @var yii\web\View $this */
/** @var app\models\forms\SignupForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Reg-Admin';

?>
<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php $form = ActiveForm::begin([
                    'action' => Url::to(['user/signup']),
                    'method' => 'post',
                    'enableAjaxValidation' => false,
                    'options' => [
//                        'class' => '',
                        'enctype' => 'application/x-www-form-urlencoded',
                        'novalidate' => true,
                        'autocomplete' => 'off'
                    ],
                        'fieldConfig' => [
//                            'options' => ['class' => ''],
//                            'inputOptions' => ['class' => ''],
//                            'labelOptions' => ['class' => ''],
//                            'errorOptions' => ['class' => ''],
//                            'template' => '{label}{input}{error}',
                        ]
                ]); ?>


                <?= $form->field($model, 'login')->textInput() ?>
                <?= $form->field($model, 'password')->input('password') ?>
                <?= $form->field($model, 'password_repeat')->input('password') ?>
                <?= $form->field($model, 'token')->input('text') ?>

                <?= Html::submitInput('Регистрация', ['class' => 'btn btn-primary']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>



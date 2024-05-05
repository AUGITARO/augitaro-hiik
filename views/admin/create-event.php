<?php

/** @var yii\web\View $this */
/** @var app\models\forms\EventForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Создать мероприятие';

?>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php $form = ActiveForm::begin([
                    'action' => Url::to(['admin/create-event']),
                    'method' => 'post',
                    'enableAjaxValidation' => false,
                    'options' => [
                        // 'class' => '',
                        'enctype' => 'multipart/form-data',
                        'novalidate' => true,
                        'autocomplete' => 'off'
                    ],
                    'fieldConfig' => [
                        // 'options' => ['class' => ''],
                        // 'inputOptions' => ['class' => ''],
                        // 'labelOptions' => ['class' => ''],
                        // 'errorOptions' => ['class' => ''],
                        // 'template' => '{label}{input}{error}',
                    ]
                ]); ?>

                <?= $form->field($model, 'title')->textInput() ?>
                <?= $form->field($model, 'description')->textInput() ?>
                <?= $form->field($model, 'date')->input('date') ?>
                <?= $form->field($model, 'imageFile')->fileInput() ?>

                <?= Html::submitInput('Создать', ['class' => '']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>

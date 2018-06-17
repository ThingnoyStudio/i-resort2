<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ADid') ?>

    <?= $form->field($model, 'ADnumber') ?>

    <?= $form->field($model, 'ADhome') ?>

    <?= $form->field($model, 'ADsubdistrict') ?>

    <?= $form->field($model, 'ADdistrict') ?>

    <?php // echo $form->field($model, 'ADprovince') ?>

    <?php // echo $form->field($model, 'ADzipcode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

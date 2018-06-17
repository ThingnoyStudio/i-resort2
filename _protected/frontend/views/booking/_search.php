<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BookingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Bid') ?>

    <?= $form->field($model, 'Bdate') ?>

    <?= $form->field($model, 'Rid') ?>

    <?= $form->field($model, 'Uid') ?>

    <?= $form->field($model, 'ADid') ?>

    <?php // echo $form->field($model, 'Bnday') ?>

    <?php // echo $form->field($model, 'Bdatein') ?>

    <?php // echo $form->field($model, 'Bdateout') ?>

    <?php // echo $form->field($model, 'Pid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

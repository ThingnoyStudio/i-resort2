<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Uid') ?>

    <?= $form->field($model, 'Ufname') ?>

    <?= $form->field($model, 'Ulname') ?>

    <?= $form->field($model, 'Uemail') ?>

    <?= $form->field($model, 'Uphone') ?>

    <?php // echo $form->field($model, 'Uimg') ?>

    <?php // echo $form->field($model, 'ADid') ?>

    <?php // echo $form->field($model, 'USid') ?>

    <?php // echo $form->field($model, 'iduser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

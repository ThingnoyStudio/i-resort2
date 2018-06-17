<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ADnumber')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ADhome')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ADsubdistrict')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ADdistrict')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ADprovince')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ADzipcode')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

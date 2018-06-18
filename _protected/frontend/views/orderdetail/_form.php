<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orderdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Fid')->textInput() ?>

    <?= $form->field($model, 'Oid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Bdate')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Rid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Uid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ADid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Bnday')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Bdatein')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Bdateout')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Pid')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

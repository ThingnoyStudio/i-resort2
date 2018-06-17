<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Rname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Rnumber')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Rdes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Rimg')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'RSid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

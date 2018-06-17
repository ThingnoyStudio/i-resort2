<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PromotionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Pid') ?>

    <?= $form->field($model, 'Pname') ?>

    <?= $form->field($model, 'Pdatestart') ?>

    <?= $form->field($model, 'Pdateend') ?>

    <?= $form->field($model, 'Pdistant') ?>

    <?php // echo $form->field($model, 'Ping') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

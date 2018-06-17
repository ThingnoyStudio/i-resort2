<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Promotion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promotion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Pname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Pdatestart')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Pdateend')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Pdistant')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Ping')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

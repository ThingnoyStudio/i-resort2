<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Ufname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Ulname')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Uemail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Uphone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Uimg')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ADid')->textInput() ?>

    <?= $form->field($model, 'USid')->textInput() ?>

    <?= $form->field($model, 'iduser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

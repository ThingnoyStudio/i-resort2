<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Roomtype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roomtype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RTname')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['roomtype/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-warning">
  <div class="box-body">

<div class="user-form col-lg-6 col-lg-offset-3" style="@media (min-width: 768px){margin-left: 25%;}">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['class' => 'your class','style'=>'display:none;'])->label(false); ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      <?= Html::a(Yii::t('app', 'ยกเลิก'), ['user/index'], ['class' => 'btn btn-default']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>

</div><!-- /.box-body -->
</div><!-- /.box -->

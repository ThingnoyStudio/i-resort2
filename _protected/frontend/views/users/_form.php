<?php

use borales\extensions\phoneInput\PhoneInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */
/* @var $model2 frontend\models\Users */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form col-lg-6 col-lg-offset-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Ufname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ulname')->textInput() ?>

    <?= $form->field($model, 'Uemail')->input('email') ?>

    <?= $form->field($model, 'Uphone')->input('number') ?>

    <!--    <? //= $form->field($model, 'Uimg')->fileInput(['rows' => 6]) ?>-->

    <div class="row">
        <div class="col-md-6">
            <div class="well text-center"
                 style="min-height: 20px;
                    padding: 19px;
                    margin-bottom: 20px;
                    background-color: #f5f5f5;
                    border: 1px solid #e3e3e3;
                    border-radius: 4px;
                    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
                <?= Html::img(Yii::getAlias('@ShowU') . '/' . $model->Uimg, ['style' => 'width:100px;', 'class' => 'img-rounded', 'style' => 'border-radius: 6px;']); ?>
            </div>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'Uimg')->fileInput() ?>
        </div>
    </div>

<!--    <?//= $form->field($model, 'ADid')->textInput() ?>-->

    <?= $form->field($model, 'USid')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'iduser')->hiddenInput()->label(false) ?>

    <?= $form->field($model2, 'ADnumber')->input('number',['maxlength' => 5])  ?>
    <?= $form->field($model2, 'ADhome')->textInput() ?>
    <?= $form->field($model2, 'ADsubdistrict')->textInput() ?>
    <?= $form->field($model2, 'ADdistrict')->textInput() ?>
    <?= $form->field($model2, 'ADprovince')->textInput() ?>
    <?= $form->field($model2, 'ADzipcode')->input('number',['maxlength' => 5])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['users/view', 'id' => $model->iduser], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

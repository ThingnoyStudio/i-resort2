<?php

use borales\extensions\phoneInput\PhoneInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user frontend\models\Users */
/* @var $address frontend\models\Address */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form col-lg-6 col-lg-offset-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'password_repeat')->passwordInput() ?>

    <hr>
    <br>

    <?= $form->field($user, 'Ufname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'Ulname')->textInput() ?>

    <?= $form->field($user, 'Uphone')->input('number') ?>

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
                <?= Html::img(Yii::getAlias('@ShowU') . '/' . $user->Uimg, ['style' => 'width:100px;', 'class' => 'img-rounded', 'style' => 'border-radius: 6px;']); ?>
            </div>
        </div>
        <div class="col-md-6">
            <?= $form->field($user, 'Uimg')->fileInput() ?>
        </div>
    </div>

    <?= $form->field($user, 'USid')->hiddenInput()->label(false) ?>

    <?= $form->field($user, 'iduser')->hiddenInput()->label(false) ?>

    <?= $form->field($address, 'ADnumber')->input('number', ['maxlength' => 5]) ?>
    <?= $form->field($address, 'ADhome')->textInput() ?>
    <?= $form->field($address, 'ADsubdistrict')->textInput() ?>
    <?= $form->field($address, 'ADdistrict')->textInput() ?>
    <?= $form->field($address, 'ADprovince')->textInput() ?>
    <?= $form->field($address, 'ADzipcode')->input('number', ['maxlength' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton($user->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['users/index2'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

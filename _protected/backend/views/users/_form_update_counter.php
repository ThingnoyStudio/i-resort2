<?php

use backend\models\Userstatus;
use borales\extensions\phoneInput\PhoneInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user frontend\models\Users */
/* @var $address frontend\models\Address */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    <= $form->field($model, 'username') ?>-->
<!--    <= $form->field($model, 'email') ?>-->
<!--    <= $form->field($model, 'password')->passwordInput() ?>-->
<!--    <= $form->field($model, 'password_repeat')->passwordInput() ?>-->
<!---->
<!--    <hr>-->
<!--    <br>-->

    <?= $form->field($user, 'Ufname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'Ulname')->textInput() ?>

    <?= $form->field($user, 'Uphone')->widget(PhoneInput::className(), [
        'jsOptions' => [
            'preferredCountries' => ['th', 'pl', 'ua'],
        ]
    ]) ?>

    <div class="row">
        <div class="col-md-6">
            <div class="well text-center">
                <?= Html::img(Yii::getAlias('@ShowU') . '/' . $user->Uimg, ['style'=>'width:100%;','class'=>'img-rounded']); ?>
            </div>
        </div>
        <div class="col-md-6">
            <?= $form->field($user, 'Uimg')->fileInput() ?>
        </div>
    </div>

    <?= $form->field($user, 'USid')->dropDownList(
        ArrayHelper::map(Userstatus::find()->all(),'USid','USname'),
        ['promp'=>'เลือกประเภทตำแหน่ง']
    ) ?>

    <?= $form->field($user, 'iduser')->hiddenInput()->label(false) ?>

    <?= $form->field($address, 'ADnumber')->input('number', ['maxlength' => 5]) ?>
    <?= $form->field($address, 'ADhome')->textInput() ?>
    <?= $form->field($address, 'ADsubdistrict')->textInput() ?>
    <?= $form->field($address, 'ADdistrict')->textInput() ?>
    <?= $form->field($address, 'ADprovince')->textInput() ?>
    <?= $form->field($address, 'ADzipcode')->input('number', ['maxlength' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton($user->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['users/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

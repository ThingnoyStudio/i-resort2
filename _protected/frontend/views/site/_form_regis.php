<?php

use borales\extensions\phoneInput\PhoneInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user frontend\models\Users */
/* @var $address frontend\models\Address */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="l">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'password_repeat')->passwordInput() ?>

    <hr>
    <br>

    <div class="form-group">
        <?= Html::submitButton($user->isNewRecord ? 'ลงทะเบียน' : 'แก้ไข', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
<!--        <= Html::a(Yii::t('app', 'ยกเลิก'), ['users/index2'], ['class' => 'btn btn-default']) ?>-->
    </div>

    <?php ActiveForm::end(); ?>

</div>

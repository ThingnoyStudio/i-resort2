<?php

use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('app', 'สมัครสมาชิก');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">



    <div class="col-lg-6 col-lg-offset-3">
        <h1><?= Html::encode($this->title) ?></h1>

        <p><?= Yii::t('app', 'กรุณากรอกข้อมูลให้ครบเพื่อสมัครสมาชิก:') ?></p>

        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
<!--        <= $form->field($model, 'password')->widget(PasswordInput::classname(), []) ?>-->
        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'ลงทะเบียน'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php if ($model->scenario === 'rna'): ?>
            <div style="color:#666;margin:1em 0">
                <i>*<?= Yii::t('app', 'We will send you an email with account activation link.') ?></i>
            </div>
        <?php endif ?>

    </div>
</div>
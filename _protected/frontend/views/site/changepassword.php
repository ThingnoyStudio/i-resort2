<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'เปลี่ยนรหัสผ่าน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning">
    <div class="box-body">
        <div class="col-lg-6 col-lg-offset-3">
<!--             <h1><?//= Html::encode($this->title) ?></h1>-->

            <p>กรุณากรอกข้อมูลให้ครบเพื่อเปลี่ยนรหัสผ่าน:</p>

            <?php $form = ActiveForm::begin([
                'id' => 'changepassword-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"\">
                        {input}</div>\n<div class=\"\">
                        {error}</div>",
                    'labelOptions' => ['class' => 'control-label'],
                ],
            ]); ?>
            <?= $form->field($model, 'oldpass', ['inputOptions' => [
                'placeholder' => 'รหัสผ่านเก่า'
            ]])->passwordInput() ?>

            <?= $form->field($model, 'newpass', ['inputOptions' => [
                'placeholder' => 'รหัสผ่านใหม่'
            ]])->passwordInput() ?>

            <?= $form->field($model, 'repeatnewpass', ['inputOptions' => [
                'placeholder' => 'ยืนยันรหัสผ่านใหม่'
            ]])->passwordInput() ?>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-11">
                    <?= Html::submitButton('เปลี่ยนรหัสผ่าน', [
                        'class' => 'btn btn-primary'
                    ]) ?>
<!--                    <?//= Html::a(Yii::t('app', 'ยกเลิก'), ['user/index'], ['class' => 'btn btn-default']) ?>-->
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div><!-- /.box-body -->
</div><!-- /.box -->

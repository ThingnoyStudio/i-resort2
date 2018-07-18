<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'PMid')->dropDownList(
        ArrayHelper::map(\frontend\models\Payment::find()->all(),'PMid','PMname'),
        ['promp'=>'เลือกประเภทตำแหน่ง']
    ) ?>


    <div class="form-group">
        <?= Html::submitButton($user->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['index3'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

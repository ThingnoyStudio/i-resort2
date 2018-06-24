<?php

use backend\models\Roomtype;
use frontend\models\Roomstatus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'RSid')->dropDownList(
        ArrayHelper::map(Roomstatus::find()->all(),'RSid','RSname'),
        ['promp'=>'เลือกประเภทสถานะ']
    ) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'บันทึกและพิมพ์ใบเสร็จ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'กลับ'), ['booking/index3'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


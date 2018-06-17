<?php

use backend\models\Roomtype;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Rname')->textInput() ?>

    <?= $form->field($model, 'Rnumber')->textInput([
        'type' => 'number'
    ]) ?>

    <?= $form->field($model, 'Rdes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Rimg')->fileInput()  ?>

    <?= $form->field($model, 'RSid')->dropDownList(
        ArrayHelper::map(Roomtype::find()->all(),'RSid','RSname'),
        ['promp'=>'เลือกประเภทตำแหน่ง']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['room/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

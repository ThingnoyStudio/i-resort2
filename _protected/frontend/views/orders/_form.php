<?php


use kartik\widgets\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    <= $form->field($model, 'Odate')->textarea(['rows' => 6]) ?>-->
    <?php
    echo '<label>วันที่จอง</label>';
    echo DateTimePicker::widget([
        'name' => 'Odate',
        'options' => ['placeholder' => 'Select operating time ...'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'Y-m-d g:i',
            'startDate' => '01-Mar-2014 12:00 AM',
            'todayHighlight' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'Optotal')->textInput(['type' => 'number']) ?>
    
    <?= $form->field($model, 'Pid')->dropDownList(
        ArrayHelper::map(\frontend\models\Payment::find()->all(),'PMid','PMname'),
        ['promp'=>'เลือกประเภทตำแหน่ง']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

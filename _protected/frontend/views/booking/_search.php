<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BookingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['reportbooking'],
        'method' => 'get',
    ]); ?>

    <?php // echo $form->field($model, 'Bid') ?>

    <?= $form->field($model, 'month')->dropDownList(
        ArrayHelper::map(\frontend\models\Month::find()->all(), 'Mnum', 'Mname'),
        ['prompt' => '--เลือกเดือน--']
    ) ?>

    <?= $form->field($model, 'year')->dropDownList(
            $model->getYearsList(),
            ['prompt' => '--เลือกปี--']
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
        <!--        <= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>-->
        <?= Html::a('ค้นหาทั้งหมด', ['reportbooking'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

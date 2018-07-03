<?php


use kartik\daterange\DateRangePicker;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */
/* @var $form yii\widgets\ActiveForm */

$addon = <<< HTML
<span class="input-group-addon" style="padding: 10px 18px 10px 0;">
    <i class="material-icons">today</i>
</span>
HTML;


?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo '<label>วันที่จอง</label>';
    echo '<div class="input-group drp-container">';
    echo DateRangePicker::widget([
//            'name'=>'date_range_4',
            'model'=>$model,
            'attribute'=>'Odate',
            'value'=>date('Y-m-d'),
            'useWithAddon'=>true,
            'pluginOptions'=>[
                'singleDatePicker'=>true,
                'showDropdowns'=>true,
            ]
        ]) . $addon;
    echo '</div>';
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

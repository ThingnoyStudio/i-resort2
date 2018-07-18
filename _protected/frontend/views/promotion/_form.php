<?php

use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Promotion */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$addon = <<< HTML
<span class="input-group-addon">
    <!--<i class="glyphicon glyphicon-calendar"></i>-->
    <i class = "material-icons" style="    margin-left: -33px;
    position: absolute;" > date_range </i>
</span>
HTML;
?>

<div class="promotion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Pname')->textInput() ?>
    <?php

    echo '<p><b>วันที่เริ่มต้น - สิ้นสุด</b></p>';
    $model->Pdatestart = date('Y-m-d');//ตัวแปลวันที่เริ่มต้น
    $model->Pdateend = date('Y-m-d');//ตัวแปลวันที่เข้าพัก
//        $form->field($model, 'kvdate1');
    echo '<div class="input-group drp-container">';
    echo DateRangePicker::widget([
            'model'=>$model,
            'attribute' => 'kvdate1',
            'useWithAddon'=>true,
            'convertFormat'=>true,
            'startAttribute' => 'Pdatestart',
            'endAttribute' => 'Pdateend',
        'language' => 'th',
            'pluginOptions'=>[
                'locale'=>['format' => 'Y-m-d'],
            ]
        ]).$addon;

    echo '</div>';
    ?>

    <?= $form->field($model, 'Pdistant')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'Pimg')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['promotion/index3'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$addon = <<< HTML
<span class="input-group-addon">
    <!--<i class="glyphicon glyphicon-calendar"></i>-->
    <i class = "material-icons" style="margin-left: -29px;" > date_range </i>
</span>
HTML;
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Rid')->textInput(['type' => 'number'])?>

    <?php

    echo '<p><b>วันที่เช็คอิน - วันที่เช็คเอ้า</b></p>';
    $model->Bdatein = date('Y-m-d');//ตัวแปลวันที่เริ่มต้น
    $model->Bdateout = date('Y-m-d');//ตัวแปลวันที่เข้าพัก
    //        $form->field($model, 'kvdate1');
    echo '<div class="input-group drp-container">';
    echo DateRangePicker::widget([
            'model'=>$model,
            'attribute' => 'datebetween',
            'useWithAddon'=>true,
            'convertFormat'=>true,
            'startAttribute' => 'Bdatein',
            'endAttribute' => 'Bdateout',
            'language' => 'th',
            'pluginOptions'=>[
                'locale'=>['format' => 'Y-m-d'],
            ]
        ]).$addon;

    echo '</div>';
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['index5'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

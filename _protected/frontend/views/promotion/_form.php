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
    position: absolute; z-index: 3;" > date_range </i>
</span>
HTML;
?>

<div class="promotion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Pname')->textInput() ?>

    <?php

    echo '<p><b>วันที่เริ่มต้น - สิ้นสุด</b></p>';
//    $model->Pdatestart = date('Y-m-d');//ตัวแปลวันที่เริ่มต้น
//    $model->Pdateend = date('Y-m-d');//ตัวแปลวันที่เข้าพัก
//        $form->field($model, 'kvdate1');
    echo '<div class="input-group drp-container">';
    echo DateRangePicker::widget([
            'model'=>$model,
            'attribute' => 'kvdate1',
            'useWithAddon'=>true,
            'convertFormat'=>true,
            'disabled' => true,
            'startAttribute' => 'Pdatestart',
            'endAttribute' => 'Pdateend',
        'language' => 'th',
            'pluginOptions'=>[
//                'locale'=>['format' => 'Y-m-d'],
                'locale' => ['format' => 'd-m-Y'],
                'opens' => 'right',
                'drops' => 'up',
                'minDate' => date('d-m-Y'),
            ]
        ]).$addon;

    echo '</div>';
    ?>

    <?= $form->field($model, 'Pdistant')->textInput(['type' => 'number']) ?>

    <div class="row">
        <div class="col-md-6">
            <div class="well text-center"
                 style="min-height: 20px;
                    padding: 19px;
                    margin-bottom: 20px;
                    background-color: #f5f5f5;
                    border: 1px solid #e3e3e3;
                    border-radius: 4px;
                    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
                <?= Html::img(Yii::getAlias('@ShowP') . '/' . $model->Pimg, ['style' => 'width:100px;', 'class' => 'img-rounded', 'style' => 'border-radius: 6px;']); ?>
            </div>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'Pimg')->fileInput() ?>
        </div>
    </div>

    <div class="form-group">
<!--        <= Html::a($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['create'], ['class' => 'btn btn-success', 'onclick' => 'this.parentNode.submit()', 'data-method' => 'post']) ?>-->
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['promotion/index3'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

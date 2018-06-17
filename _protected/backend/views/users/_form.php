<?php

use backend\models\Address;
use backend\models\Userstatus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Ufname')->textInput() ?>

    <?= $form->field($model, 'Ulname')->textInput() ?>

    <?= $form->field($model, 'Uemail')->input('email')  ?>

    <?= $form->field($model, 'Uphone')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Uimg')->fileInput() ?>

<!--    <= $form->field($model, 'ADid')->dropDownList(-->
<!--        ArrayHelper::map(Address::find()->all(),'ADid','ADname'),-->
<!--        ['promp'=>'เลือกประเภทตำแหน่ง']-->
<!--    ) ?>-->

    <?= $form->field($model, 'USid')->dropDownList(
        ArrayHelper::map(Userstatus::find()->all(),'USid','USname'),
        ['promp'=>'เลือกประเภทตำแหน่ง']
    ) ?>


<!--    <= $form->field($model, 'iduser')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'ยกเลิก'), ['users/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

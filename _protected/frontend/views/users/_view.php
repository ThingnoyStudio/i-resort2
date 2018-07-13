<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */

$this->title = 'โปรไฟล์';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view col-lg-6 col-lg-offset-3">

<!--    <h1><?//= Html::encode($this->title) ?></h1>-->

    <p>
<!--        <= Html::a('แก้ไข', ['update', 'id' => $model->Uid], ['class' => 'btn btn-primary']) ?>-->
<!--        <?//= Html::a('Delete', ['delete', 'id' => $model->Uid], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>-->
        <?= Html::a("<i class=\"glyphicon glyphicon-menu-left\"></i> " . Yii::t('app', 'กลับ'),
            ['users/index2'],
            ['class' => 'btn btn-default']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-pencil\"></i> " . Yii::t('app', 'แก้ไข'),
            ['update', 'id' => $model->Uid],
            ['class' => 'btn btn-primary']) ?>
<!--        <= Html::a("<i class=\"glyphicon glyphicon-trash\"></i> " . Yii::t('app', 'ลบ'),-->
<!--            ['delete', 'id' => $model->Uid],-->
<!--            [-->
<!--                'class' => 'btn btn-danger',-->
<!--                'data' => [-->
<!--                    'confirm' => Yii::t('app', 'ต้องการลบรายการนี้หรือไม่?'),-->
<!--                    'method' => 'post',-->
<!--                    'data-pjax' => '1'-->
<!--                ],-->
<!--            ]) ?>-->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Uid',
            'Ufname:ntext',
            'Ulname:ntext',
            'Uemail:ntext',
            'Uphone:ntext',
//            'Uimg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'Uimg',
                'value' => Html::img(Yii::getAlias('@ShowU')  . $model->Uimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
//            'ADid',
//            'USid',
//            'iduser',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $model2,
        'attributes' => [
//            'ADid',
            'ADnumber:ntext',
            'ADhome:ntext',
            'ADsubdistrict:ntext',
            'ADdistrict:ntext',
            'ADprovince:ntext',
            'ADzipcode',
//            'Uid',
        ],
    ]) ?>

</div>

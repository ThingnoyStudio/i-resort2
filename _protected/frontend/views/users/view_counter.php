<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */

$this->title = 'โปรไฟล์ลูกค้า';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลลูกค้า', 'url' => ['index2']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view col-lg-6 col-lg-offset-3">

    <p>
        <?= Html::a("<i class=\"glyphicon glyphicon-menu-left\"></i> " . Yii::t('app', 'กลับ'),
            ['index2'],
            ['class' => 'btn btn-default']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-pencil\"></i> " . Yii::t('app', 'แก้ไข'),
            ['update_counter', 'id' => $model->Uid],
            ['class' => 'btn btn-primary']) ?>
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
                'value' => Html::img(Yii::getAlias('@ShowU') . $model->Uimg, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
//            'ADid',
//            'USid',
//            'iduser',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $model2,
        'attributes' => [
            'ADid',
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

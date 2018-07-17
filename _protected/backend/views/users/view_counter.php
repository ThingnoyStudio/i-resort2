<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */

$this->title = 'ข้อมูลผู้ใช้งาน';
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <p>
        <?= Html::a("<i class=\"glyphicon glyphicon-menu-left\"></i> " . Yii::t('app', 'กลับ'),
            ['index'],
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
            'user.username',
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

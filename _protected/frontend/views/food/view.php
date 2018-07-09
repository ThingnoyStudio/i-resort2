<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Food */

$this->title = $model->Fid;
$this->params['breadcrumbs'][] = ['label' => 'อาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a("<i class=\"glyphicon glyphicon-menu-left\"></i> " . Yii::t('app', 'กลับ'),
            ['index'],
            ['class' => 'btn btn-default']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-pencil\"></i> " . Yii::t('app', 'แก้ไข'),
            ['update', 'id' => $model->Fid],
            ['class' => 'btn btn-primary']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-trash\"></i> " . Yii::t('app', 'ลบ'),
            ['delete', 'id' => $model->Fid],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'ต้องการลบรายการนี้หรือไม่?'),
                    'method' => 'post',
                    'data-pjax' => '1'
                ],
            ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Fid',
            'Fname:ntext',
            'Fprice:ntext',
//            'Fimg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'Fimg',
                'value' => Html::img(Yii::getAlias('@ShowF')  . $model->Fimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
        ],
    ]) ?>

</div>

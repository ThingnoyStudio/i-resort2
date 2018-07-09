<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = $model->Oid;
$this->params['breadcrumbs'][] = ['label' => 'ราการสั่งซื้อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a("<i class=\"glyphicon glyphicon-menu-left\"></i> " . Yii::t('app', 'กลับ'),
            ['index'],
            ['class' => 'btn btn-default']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-pencil\"></i> " . Yii::t('app', 'แก้ไข'),
            ['update', 'id' => $model->Oid],
            ['class' => 'btn btn-primary']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-trash\"></i> " . Yii::t('app', 'ลบ'),
            ['delete', 'id' => $model->Oid],
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
            'Oid',
            'Odate:ntext',
            [
                'format' => 'raw',
                'attribute' => 'orderDetail.food.Fimg',
                'value' => Html::img(Yii::getAlias('@ShowF')  . $model->orderDetail->food->Fimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'orderDetail.food.Fname',
            'orderDetail.ODnum',
            'Optotal:ntext',
            'payment.PMname',
            'Bid',
        ],
    ]) ?>

</div>

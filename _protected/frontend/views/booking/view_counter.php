<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */

$this->title = $model->Bid;
$this->params['breadcrumbs'][] = ['label' => 'การเข้าพัก', 'url' => ['index5']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a("<i class=\"glyphicon glyphicon-menu-left\"></i> " . Yii::t('app', 'กลับ'),
            ['index5'],
            ['class' => 'btn btn-default']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-pencil\"></i> " . Yii::t('app', 'แก้ไข'),
            ['update_counter', 'id' => $model->Bid],
            ['class' => 'btn btn-primary']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-trash\"></i> " . Yii::t('app', 'ลบ'),
            ['delete_counter', 'id' => $model->Bid],
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
//            'Bid',
            'Bdate:ntext',
            [
                'format' => 'raw',
                'attribute' => 'room.Rimg',
                'value' => Html::img(Yii::getAlias('@ShowR') . $model->room->Rimg, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'room.Rname',
            'room.Rnumber',

//            'Rid:ntext',
//            'Uid:ntext',
            'users.Ufname',
            'users.Ulname',
//            'ADid:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'Btotal',
//            'PMid:ntext',
        ],
    ]) ?>

    <p>
        <?= Html::a('เช็คอิน', ['updatestatus2', 'id' => $model->Rid, 'id2' => $model->Bid], ['class' => 'btn btn-primary']) ?>
    </p>

</div>

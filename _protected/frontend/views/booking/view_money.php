<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */

$this->title = $model->Bid;
$this->params['breadcrumbs'][] = ['label' => 'จัดการสถานะห้องพัก', 'url' => ['index3']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('กลับ', ['chbooking'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('ยืนยัน', ['updatebil', 'id' => $model->Bid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณต้องการยืนยัน ความถูกต้องของการชำระเงิน รายการนี้หรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <h4><b>ข้อมูลการจอง</b></h4>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Bid',
            'Bdate:ntext',
//            'room.Rnumber',

            [
                'format' => 'raw',
                'attribute' => 'Bbil',
                'value' => Html::img(Yii::getAlias('@ShowBil')  . $model->Bbil , ['class' => 'img-thumbnail', 'style' => 'width:70%; height:auto;'])
            ],
            'users.Ufname',
            'users.Ulname',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'Btotal',
            'Bstatus',
            'payment.PMname',
        ],
    ]) ?>

    <h4><b>ข้อมูลลูกค้า</b></h4>
    <?= DetailView::widget([
        'model' => $user,
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
                'value' => Html::img(Yii::getAlias('@ShowU')  . $user->Uimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
//            'ADid',
//            'USid',
//            'iduser',
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $address,
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

    <h4><b>ข้อมูลห้องพัก</b></h4>
    <?= DetailView::widget([
        'model' => $model2,
        'attributes' => [
//            'Rid',
            'Rname:ntext',
            'Rnumber:ntext',
            'Rdes:ntext',
//            'Rimg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'Rimg',
                'value' => Html::img(Yii::getAlias('@ShowR') . $model2->Rimg, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'roomstatus.RSname',
        ],
    ]) ?>

</div>

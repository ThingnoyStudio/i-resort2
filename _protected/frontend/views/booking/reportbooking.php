<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
?>
<p>
    <?= Html::a('Print', ['mpdfdemo1'], ['class' => 'btn btn-success']) ?>
</p>
<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">
    <h1>รายงานการเข้าพัก</h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'Bid',
            'Bdate:ntext',
            'Rid:ntext',
            'room.Rname',
            'users.Ufname:ntext',
            'users.Ulname:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'payment.PMname',
            'Btotal',
        ],
    ]); ?>





</div>

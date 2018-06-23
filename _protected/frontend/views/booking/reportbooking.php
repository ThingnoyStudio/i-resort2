<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">

    <h1>รายงานการเข้าพัก</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'Bid',
            'Bdate:ntext',
            'Rid:ntext',
            'room.Rname',
            'Uid',
            'users.Ufname:ntext',
            'users.Ulname:ntext',
//            'ADid:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
//            'PMid:ntext',
            'payment.PMname',

        ],
    ]); ?>



</div>

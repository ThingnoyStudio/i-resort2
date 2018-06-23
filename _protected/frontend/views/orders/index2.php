<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
?>
<div class="orders-index">
    <h1>รายงานการสั่งซื้ออาหาร</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'Oid',
            'Odate:ntext',
            'Optotal:ntext',
            'Pid',
            'Bid',



            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

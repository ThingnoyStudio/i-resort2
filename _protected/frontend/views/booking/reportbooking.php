<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Bid',
            'Bdate:ntext',
            'Rid:ntext',
            'Uid:ntext',
            'ADid:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'PMid:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>

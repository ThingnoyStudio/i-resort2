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
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'Bid',
            'Bdate:ntext',
            'room.Rnumber',
            'room.Rname',
            'users.Ufname',
            'users.Ulname',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'payment.PMname',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'headerOptions' => ['class' => 'text-center'],
                'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="..."> {view2} {update2} </div>',
                'buttons' => [
                    'view2' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-eye"></i>', $url,
                            ['title' => 'View user',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'idA' => 'ADid',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
                    'update2' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-pencil"></i>', $url,
                            ['title' => 'Edit user',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    }
                ]
            ],// ActionColumn
        ],
    ]); ?>


</div>

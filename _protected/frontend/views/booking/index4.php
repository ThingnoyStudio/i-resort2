<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การจอง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'Bid',
            'Bdate:ntext',
            'users.Ufname',
            'users.Ulname',
//            'Rid:ntext',
            [
                'options' => ['style' => 'width:150px;'],
                'format' => 'raw',
                'attribute' => 'room.Rimg',
                'value' => function ($model) {
                    return Html::tag('div', '', [
                        'style' => 'width:100px;height:100px;
                              border-top: 10px solid rgba(255, 255, 255, .46);
                              background-image:url(' . Yii::getAlias('@ShowR') . $model->room->Rimg . ');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              align-items: center;margin: auto;
                              ']);
                }
            ],
            'room.Rnumber',
            'room.Rname',
//            'room.Rdes',

//            'Uid:ntext',
//            'ADid:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'Btotal',
            'payment.PMname',
            //'Pid:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'headerOptions' => ['class' => 'text-center'],
                'template' => '<div > {view3} </div>',
                'buttons' => [
                    'view3' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-eye"></i>', $url,
                            ['title' => 'View user',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'idA' => 'ADid',
                            ]);
                    }
                ]
            ],// ActionColumn
        ],
    ]); ?>


</div>

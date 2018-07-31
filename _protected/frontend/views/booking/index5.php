<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การเข้าพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= Html::a('เพิ่มการจอง', ['room/index_counter'], ['class' => 'btn btn-success']) ?>

    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'table-layout:fixed;'],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'Bid',
            'Bdate:ntext',
            [
                'label' => 'หมายเลขห้อง',
                'attribute' => 'Rnumber',
                'value' => 'room.Rnumber',
                'contentOptions' => ['style' => 'width:5px;'],
//                'filter' => Html::activeDropDownList($searchModel, 'roomstatus', \frontend\models\Roomstatus::getRoomStatusName()
//                    , ['class' => 'form-control', 'prompt' => '--กรุณาเลือกรายการ--']),
            ],
            [
                'label' => 'ชื่อห้อง',
                'attribute' => 'Rname',
                'value' => 'room.Rname',
//                'filter' => Html::activeDropDownList($searchModel, 'roomstatus', \frontend\models\Roomstatus::getRoomStatusName()
//                    , ['class' => 'form-control', 'prompt' => '--กรุณาเลือกรายการ--']),
            ],
            [
                'label' => 'ชื่อ',
                'attribute' => 'Ufname',
                'value' => 'users.Ufname',
//                'filter' => Html::activeDropDownList($searchModel, 'roomstatus', \frontend\models\Roomstatus::getRoomStatusName()
//                    , ['class' => 'form-control', 'prompt' => '--กรุณาเลือกรายการ--']),
            ],
            [
                'label' => 'นามสกุล',
                'attribute' => 'Ulname',
                'value' => 'users.Ulname',
//                'filter' => Html::activeDropDownList($searchModel, 'roomstatus', \frontend\models\Roomstatus::getRoomStatusName()
//                    , ['class' => 'form-control', 'prompt' => '--กรุณาเลือกรายการ--']),
            ],
            [
                'label' => 'เบอร์โทร',
                'attribute' => '',
                'value' => 'users.Uphone',
//                'filter' => Html::activeDropDownList($searchModel, 'roomstatus', \frontend\models\Roomstatus::getRoomStatusName()
//                    , ['class' => 'form-control', 'prompt' => '--กรุณาเลือกรายการ--']),
            ],

//            'room.Rnumber',
//            'room.Rname',
//            'users.Ufname',
//            'users.Ulname',
//            'Bnday:ntext',
            [
                'attribute' => 'Bnday',
//                'contentOptions' => ['style' => 'max-width:150px; min-height:100px; overflow: auto; word-wrap: break-word;'],
                'contentOptions' => ['style' => 'width:5%;'],
            ],
            'Bdatein:ntext',
            'Bdateout:ntext',
            'Btotal',

            'Bstatus',
            'payment.PMname',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'headerOptions' => ['class' => 'text-center'],
                'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="..."> {view} {update} {delete} </div>',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-eye"></i>',
                            ['view_counter', 'id' => $model->Bid],
                            ['title' => 'View',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'idA' => 'ADid',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>',
                            ['update_counter', 'id' => $model->Bid],
                            ['title' => 'Edit',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-trash"></i>',
                            ['delete_counter', 'id' => $model->Bid],
                            [
                                'title' => Yii::t('yii', 'Delete'),
                                'data-confirm' => Yii::t('yii', 'คุณต้องการลบรายการนี้หรือไม่?'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;'
                            ]);
                    }
                ]
            ],// ActionColumn
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>

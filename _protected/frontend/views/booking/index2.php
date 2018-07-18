<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการสถานะห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin([ 'enablePushState' => false ]); ?>
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
            'Bstatus',
//            [
//                'label' => 'สถานะ',
//                'attribute' => 'room.RSid',
//                'value' => function ($model, $key, $index, $column) {
//                    $rs = \frontend\models\Roomstatus::findOne('Bstatus = '. $model->RSid);
//                    return $rs->RSname;
//                }
//            ],
//            'payment.PMname',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'headerOptions' => ['class' => 'text-center'],
                'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="...">{view2} {print_money} {checkout} </div>',
                'buttons' => [
                    'view2' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-eye"></i>', $url,
                            ['title' => 'ดูข้อมูล',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'idA' => 'ADid',
                                'style' => 'padding: 5px 10px; border-right: 2px solid #d4d4e0ab;']);
                    },
                    'print_money' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-print"></i>',
                            ['printslip','id'=>$model->Bid],
                            ['title' => 'พิมพ์สลิป',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
                    'checkout' => function ($url, $model, $key) {
                        if ($model->Bstatus == 'เช็คเอาท์') {
                            return Html::a('<i class="fas fa-sign-out-alt"></i>',
                                ['checkout','id'=>$model->Bid,'roomid'=>$model->Rid],
                                ['title' => 'เช็คเอาท์',
                                    'class' => 'btn btn-primary',
                                    'id' => 'actioncol',
                                    'idA' => 'ADid',
                                    'style' => 'padding: 5px 10px; visibility:hidden; border-right: 2px solid #d4d4e0ab;']);
                        } else if ($model->Bstatus == 'เช็คอิน') {
                            return Html::a('<i class="fas fa-sign-out-alt"></i>',
                                ['checkout','id'=>$model->Bid,'roomid'=>$model->Rid],
                                ['title' => 'เช็คเอาท์',
                                    'class' => 'btn btn-primary',
                                    'id' => 'actioncol',
                                    'idA' => 'ADid',
                                    'style' => 'padding: 5px 10px; border-right: 2px solid #d4d4e0ab;']);
                        } else {
                            return Html::a('<i class="fas fa-sign-out-alt"></i>',
                                ['checkout','id'=>$model->Bid,'roomid'=>$model->Rid],
                                ['title' => 'เช็คเอาท์',
                                    'class' => 'btn btn-primary',
                                    'id' => 'actioncol',
                                    'idA' => 'ADid',
                                    'style' => 'padding: 5px 10px; visibility:hidden; border-right: 2px solid #d4d4e0ab;']);
                        }
                    },

                ]
            ],// ActionColumn
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>

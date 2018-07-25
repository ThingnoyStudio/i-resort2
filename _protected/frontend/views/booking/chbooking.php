<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตรวจสอบการชำระเงิน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin([ 'enablePushState' => false ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'Bid',
            'Bdate:ntext',
            'users.Ufname',
            'users.Ulname',
//            'Rid:ntext',

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
//            'Bbil',
            [
                'options' => ['style' => 'width:150px;'],
                'format' => 'raw',
                'attribute' => 'Bbil',
                'value' => function ($model) {
                    return Html::tag('div', '', [
                        'style' => 'width:100px;height:100px;
                              background-image:url(' . Yii::getAlias('@ShowBil') . $model->Bbil . ');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              align-items: center;margin: auto;
                              ']);
                }
            ],
            //'Pid:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "ยืนยันการชำระ",
                'headerOptions' => ['class' => 'text-center'],
                'template' => '<div > {updatebil} </div>',
                'buttons' => [
                    'updatebil' => function ($url, $model, $key) {
                        return Html::a('ยืนยัน',
                            ['updatebil', 'id' => $model->Bid],
                            [
                                'title' => Yii::t('yii', 'ยืนยันการชำระเงิน'),
                                'class' => 'btn btn-primary',
                                'data-confirm' => Yii::t('yii', 'คุณต้องการยืนยัน ความถูกต้องของการชำระเงิน รายการนี้หรือไม่?'),
                                'onclick' => 'this.parentNode.submit()',
                                'data-method' => 'post']);

                    }
                ]
            ],// ActionColumn
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

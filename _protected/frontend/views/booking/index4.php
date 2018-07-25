<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerCss("
@media screen and (max-width: 1200px) {
	.table {
		overflow-x: auto;
		display: block;
	}
  .btn-group {
    float: left;
    display:flex;
    position: relative;
}
}");

$this->title = 'การจอง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">

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
            'Bstatus',
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
                            ['title' => 'เพิ่มเติม',
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

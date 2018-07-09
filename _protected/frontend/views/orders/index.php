<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ราการสั่งซื้อ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('สร้าง', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Oid',
            'Odate:ntext',
            [
                'options' => ['style' => 'width:150px;'],
                'format' => 'raw',
                'attribute' => 'orderDetail.food.Fimg',
                'value' => function ($model) {
                    return Html::tag('div', '', [
                        'style' => 'width:100px;height:100px;
                              background-image:url(' . Yii::getAlias('@ShowF') . $model->orderDetail->food->Fimg . ');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              align-items: center;margin: auto;
                              ']);
                }
            ],
            'orderDetail.food.Fname',
            'orderDetail.ODnum',
            'Optotal:ntext',
            'payment.PMname',
            'Bid',


            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'headerOptions' => ['class' => 'text-center'],
                'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="..."> {view} {update} {delete} </div>',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-eye"></i>', $url,
                            ['title' => 'View',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'idA' => 'ADid',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', $url,
                            ['title' => 'Edit',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-trash"></i>', $url, [
                            'title' => 'Delete',
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
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $p yii\data\ActiveDataProvider */


$this->title = 'ห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="room-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            [
                'options'=>['style'=>'width:150px;'],
                'format'=>'raw',
                'attribute'=>'Rimg',
                'value'=>function($model){
                    return Html::tag('div','',[
                        'style'=>'width:100px;height:100px;
                              border-top: 10px solid rgba(255, 255, 255, .46);
                              background-image:url('.Yii::getAlias('@ShowR').$model->Rimg.');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              align-items: center;margin: auto;
                              ']);
                }
            ],
//            'Rid',
            'Rname:ntext',
            'Rnumber:ntext',
            'Rdes:ntext',
//            'Rimg:ntext',


//            'RSid',
            'roomstatus.RSname',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'options' => ['style' => 'width:90px;'],
                'headerOptions' => ['class' => 'text-center'],
                'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="..."> {view2} </div>',
                'buttons' => [
                    'view2' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-eye"></i>', $url,
                            ['title' => 'View user',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    }
                ]
            ],// ActionColumn
        ],
    ]); ?>
</div>

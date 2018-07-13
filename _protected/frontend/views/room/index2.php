<?php

use frontend\assets\AppAssetJs;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $p yii\data\ActiveDataProvider */

AppAssetJs::register($this);

$this->title = 'ห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="room-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            [
                'options' => ['style' => 'width:150px;'],
                'format' => 'raw',
                'attribute' => 'Rimg',
                'value' => function ($model) {
                    return Html::tag('div', '', [
                        'style' => 'width:100px;height:100px;
                              background-image:url(' . Yii::getAlias('@ShowR') . $model->Rimg . ');
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
            [
                'label' => 'สถานะห้อง',
                'attribute' => 'roomstatus',
                'value' => 'roomstatus.RSname',
                'filter' => Html::activeDropDownList($searchModel, 'roomstatus', \frontend\models\Roomstatus::getRoomStatusName()
                    , ['class' => 'form-control', 'prompt' => '--กรุณาเลือกรายการ--']),
            ],
            [
                'label' => 'ประเภทห้อง',
                'attribute' => 'roomtype',
                'value' => 'roomtype.RTname',
                'filter' => Html::activeDropDownList($searchModel, 'roomtype', \frontend\models\Roomtype::getRoomTypeName()
                    , ['class' => 'form-control', 'prompt' => '--กรุณาเลือกรายการ--']),
            ],

//            'roomstatus.RSname',
//            'roomtype.RTname',

        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

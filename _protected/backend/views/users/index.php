<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม ผู้ใช้งาน', ['signup'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin([ 'enablePushState' => false ]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'Uid',
            [
                'options'=>['style'=>'width:150px;'],
                'format'=>'raw',
                'attribute'=>'Uimg',
                'value'=>function($model){
                    return Html::tag('div','',[
                        'style'=>'width:100px;height:100px;
                              
                              background-image:url('.Yii::getAlias('@ShowU').$model->Uimg.');
                              background-size: cover;
                              background-position:center center;
                              background-repeat:no-repeat;
                              align-items: center;margin: auto;
                              ']);
                }
            ],
//            'Uimg:ntext',
            'Ufname:ntext',
            'Ulname:ntext',
            'user.username',
            'Uemail:ntext',
            'Uphone:ntext',

//            'USname',
            [
                'attribute' => 'USid',
                'value' => 'uS.USname',
            ],
//            'userstatus.USname',
            //'iduser',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => "การทำงาน",
                'options' => ['style' => 'width:135px;'],
                'headerOptions' => ['class' => 'text-center'],
                'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="..."> {view} {update} {delete} </div>',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-eye"></i>',
                            ['view_counter','id'=>$model->Uid],
                            ['title' => 'View user',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'idA' => 'ADid',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-pencil"></i>',
                            ['update_counter','id'=>$model->Uid],
                            ['title' => 'Edit user',
                                'class' => 'btn btn-success',
                                'id' => 'actioncol',
                                'style' => 'padding: 5px 10px;    border-right: 2px solid #d4d4e0ab;']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-trash"></i>', $url, [
                            'title' => Yii::t('yii', 'Delete user'),
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

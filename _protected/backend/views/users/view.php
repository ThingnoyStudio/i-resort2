<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */

$this->title = $model->Uid;
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->Uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->Uid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ต้องการลบรายการนี้หรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'Uid',
            'Ufname:ntext',
            'Ulname:ntext',
            'user.username',
            'Uemail:ntext',
            'Uphone:ntext',
//            'Uimg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'Uimg',
                'value' => Html::img(Yii::getAlias('@ShowU')  . $model->Uimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
//            'ADid',
            'USid',
//            'iduser',
        ],
    ]) ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'ADid',
            'ADnumber:ntext',
            'ADhome:ntext',
            'ADsubdistrict:ntext',
            'ADdistrict:ntext',
            'ADprovince:ntext',
            'ADzipcode:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orderdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ODid',
            'Fid',
            'Oid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

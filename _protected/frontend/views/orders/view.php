<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = $model->Oid;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Oid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Oid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Oid',
            'Odate:ntext',
            [
                'format' => 'raw',
                'attribute' => 'orderDetail.food.Fimg',
                'value' => Html::img(Yii::getAlias('@ShowF')  . $model->orderDetail->food->Fimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'orderDetail.food.Fname',
            'orderDetail.ODnum',
            'Optotal:ntext',
            'payment.PMname',
            'Bid',
        ],
    ]) ?>

</div>

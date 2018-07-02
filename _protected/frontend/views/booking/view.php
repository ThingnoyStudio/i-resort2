<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */

$this->title = $model->Bid;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Bid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Bid], [
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
//            'Bid',
            'Bdate:ntext',
            [
                'format' => 'raw',
                'attribute' => 'room.Rimg',
                'value' => Html::img(Yii::getAlias('@ShowR') . $model->room->Rimg, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'room.Rname',
            'room.Rnumber',

//            'Rid:ntext',
//            'Uid:ntext',
            'users.Ufname',
            'users.Ulname',
//            'ADid:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'Btotal',
//            'PMid:ntext',
        ],
    ]) ?>

</div>

<?php

use yii\grid\GridView;
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
        <?= Html::a('เช็คเอ้า', ['updatestatus', 'id' => $model->Rid, 'id2' => $model->Bid], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Bid',
            'Bdate:ntext',
//            'room.Rnumber',
            'users.Ufname',
            'users.Ulname',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'Btotal',
//            'payment.PMname',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model2,
        'attributes' => [
//            'Rid',
            'Rname:ntext',
            'Rnumber:ntext',
            'Rdes:ntext',
//            'Rimg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'Rimg',
                'value' => Html::img(Yii::getAlias('@ShowR') . $model2->Rimg, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'roomstatus.RSname',
        ],
    ]) ?>


</div>

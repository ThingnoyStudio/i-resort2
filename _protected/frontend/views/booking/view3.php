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


    <?php
    $dateNow = date('Y-m-d');
    $NewDate=Date('y:m:d', strtotime("+3 days"));
    if ($NewDate <= $model->Bdatein) {

        ?>
        <p>
            <?= Html::a('ยกเลิกการจอง', ['delete', 'id' => $model->Bid], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?php
    }
    ?>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'Bid',
            'Bdate:ntext',
            [
                'format' => 'raw',
                'attribute' => 'room.Rimg',
                'value' => Html::img(Yii::getAlias('@ShowR')  . $model->room->Rimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'room.Rnumber:ntext',
//            'Uid:ntext',
//            'ADid:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
//            'PMid:ntext',
        ],
    ]) ?>

</div>

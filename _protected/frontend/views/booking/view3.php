<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */
/* @var $form yii\widgets\ActiveForm */

$this->title = $model->Bid;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <?php
    $dateNow = date('Y-m-d');
    $NewDate = Date('Y-m-d', strtotime("+3 days"));
    if ($NewDate <= $model->Bdatein) {

        ?>
        <p>
            <?= Html::a('ยกเลิกการจอง', ['delete2', 'id' => $model->Bid], [
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

    <?php
    if($model->PMid == "3" ){
        ?>
    <div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=  $form->field($model, 'Bbil')->fileInput()?>

    <?= Html::a('อัพโหลด', ['upload2', 'id' => $model->Bid], ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
    </div>
    <?php

    }
    ?>
<div class="booking-view">




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'Bid',
            'users.Ufname',
            'users.Ulname',
            'users.Uemail',
            'users.Uphone',
            'Bdate:ntext',
            [
                'format' => 'raw',
                'attribute' => 'room.Rimg',
                'value' => Html::img(Yii::getAlias('@ShowR') . $model->room->Rimg, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'room.Rnumber:ntext',
            'room.Rname',
            'room.Rdes',
//            'Uid:ntext',
//            'ADid:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'Btotal',
            'payment.PMname',
//            'PMid:ntext',
        ],
    ]) ?>

    <?= Html::a(Yii::t('app', 'กลับ'), ['booking/index4'], ['class' => 'btn btn-danger']) ?>

</div>

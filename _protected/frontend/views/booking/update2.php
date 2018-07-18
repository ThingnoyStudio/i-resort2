<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */

$this->title = 'แก้ไขสถานะ การชำระเงิน: ' . $model->Bid;
$this->params['breadcrumbs'][] = ['label' => 'จัดการสถานะห้องพัก', 'url' => ['index3']];
$this->params['breadcrumbs'][] = ['label' => $model->Bid, 'url' => ['view2', 'id' => $model->Bid]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="booking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>

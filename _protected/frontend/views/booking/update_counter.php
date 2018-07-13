<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */

$this->title = 'แก้ไขการจอง: ' . $model->Bid;
$this->params['breadcrumbs'][] = ['label' => 'การจอง', 'url' => ['index5']];
$this->params['breadcrumbs'][] = ['label' => $model->Bid, 'url' => ['view_counter', 'id' => $model->Bid]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="booking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_counter', [
        'model' => $model,
    ]) ?>

</div>

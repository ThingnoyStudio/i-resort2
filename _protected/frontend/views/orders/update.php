<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = 'แก้ไข รายการ: ' . $model->Oid;
$this->params['breadcrumbs'][] = ['label' => 'ราการสั่งซื้อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Oid, 'url' => ['view', 'id' => $model->Oid]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

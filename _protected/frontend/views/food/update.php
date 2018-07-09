<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Food */

$this->title = 'แก้ไข รายการ: ' . $model->Fid;
$this->params['breadcrumbs'][] = ['label' => 'อาหาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Fid, 'url' => ['view', 'id' => $model->Fid]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="food-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

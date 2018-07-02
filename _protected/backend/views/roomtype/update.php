<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Roomtype */

$this->title = 'แก้ไข: ' . $model->RTid;
$this->params['breadcrumbs'][] = ['label' => 'ประเภทห้องพัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RTid, 'url' => ['view', 'id' => $model->RTid]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="roomtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

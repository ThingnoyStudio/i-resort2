<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Room */

$this->title = 'แก้ไข: ' . $model->Rid;
$this->params['breadcrumbs'][] = ['label' => 'ห้องพัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Rid, 'url' => ['view', 'id' => $model->Rid]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

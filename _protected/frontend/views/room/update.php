<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Room */

$this->title = 'Update Room: ' . $model->Rid;
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Rid, 'url' => ['view', 'id' => $model->Rid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

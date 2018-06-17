<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Roomtype */

$this->title = 'Update Roomtype: ' . $model->RTid;
$this->params['breadcrumbs'][] = ['label' => 'Roomtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RTid, 'url' => ['view', 'id' => $model->RTid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roomtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Promotion */

$this->title = 'แก้ไขโปรโมชั่น: ' . $model->Pid;
$this->params['breadcrumbs'][] = ['label' => 'โปรโมชั่น', 'url' => ['index3']];
$this->params['breadcrumbs'][] = ['label' => $model->Pid, 'url' => ['view', 'id' => $model->Pid]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="promotion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

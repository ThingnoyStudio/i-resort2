<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Promotion */

$this->title = 'Update Promotion: ' . $model->Pid;
$this->params['breadcrumbs'][] = ['label' => 'Promotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Pid, 'url' => ['view', 'id' => $model->Pid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promotion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

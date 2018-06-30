<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */
/* @var $model2 frontend\models\Users */

$this->title = 'โปรไฟล์';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->Uid, 'url' => ['view', 'id' => $model->Uid]];
$this->params['breadcrumbs'][] = 'แก้ไขโปรไฟล์';
?>
<div class="users-update">

<!--    <h1><?//= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
    ]) ?>

</div>

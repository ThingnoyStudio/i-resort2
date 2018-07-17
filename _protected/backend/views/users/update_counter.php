<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */
/* @var $model2 frontend\models\Users */

$this->title = 'ข้อมูลผู้ใช้งาน';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->Uid, 'url' => ['view', 'id' => $model->Uid]];
$this->params['breadcrumbs'][] = 'แก้ไขผู้ใช้งาน';
?>
<div class="users-update">

<!--    <h1><?//= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form_update_counter', [
        'user' => $model,
        'address' => $model2,
    ]) ?>

</div>

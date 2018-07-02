<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Users */

$this->title = 'เพิ่มผุ้ใช้งาน';
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

<!--    <h1><= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

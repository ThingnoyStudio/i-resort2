<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Room */

$this->title = 'สร้าง';
$this->params['breadcrumbs'][] = ['label' => 'ห้องพัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

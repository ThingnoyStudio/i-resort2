<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Orders */

$this->title = 'สร้าง';
$this->params['breadcrumbs'][] = ['label' => 'รายการสั่งซื้อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Promotion */

$this->title = 'สร้างโปรโมชั่น';
$this->params['breadcrumbs'][] = ['label' => 'โปรโมชั่น', 'url' => ['index3']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

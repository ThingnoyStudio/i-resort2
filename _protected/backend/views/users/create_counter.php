<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SignupForm */
/* @var $user frontend\models\Users */
/* @var $address frontend\models\Address */

$this->title = 'สร้างผู้ใช้งาน';
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

<!--    <h1><= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form_counter', [
        'user' => $user,
        'address' => $address,
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SignupForm */
/* @var $user frontend\models\Users */
/* @var $address frontend\models\Address */

$this->title = 'สมัครสมาชิก';
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-6 col-lg-offset-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_regis', [
        'user' => $user,
        'address' => $address,
        'model' => $model,
    ]) ?>

</div>

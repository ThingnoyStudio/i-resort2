<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $role common\rbac\models\Role; */

$this->title = Yii::t('app', 'แก้ไข') . ': ' . $user->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ผู้ใช้'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->username, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไข');
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-lg-5 well bs-component">

        <?= $this->render('_form', [
            'user' => $user,
            'role' => $role,
        ]) ?>

    </div>

</div>

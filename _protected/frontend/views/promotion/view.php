<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Promotion */

$this->title = $model->Pid;
$this->params['breadcrumbs'][] = ['label' => 'โปรโมชั่น', 'url' => ['index3']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a("<i class=\"glyphicon glyphicon-menu-left\"></i> " . Yii::t('app', 'กลับ'),
            ['index3'],
            ['class' => 'btn btn-default']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-pencil\"></i> " . Yii::t('app', 'แก้ไข'),
            ['update', 'id' => $model->Pid],
            ['class' => 'btn btn-primary']) ?>
        <?= Html::a("<i class=\"glyphicon glyphicon-trash\"></i> " . Yii::t('app', 'ลบ'),
            ['delete_money', 'id' => $model->Pid],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'ต้องการลบรายการนี้หรือไม่?'),
                    'method' => 'post',
                    'data-pjax' => '1'
                ],
            ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Pid',
            'Pname:ntext',
            'Pdatestart:ntext',
            'Pdateend:ntext',
            'Pdistant:ntext',
//            'Pimg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'Pimg',
                'value' => Html::img(Yii::getAlias('@ShowP')  . $model->Pimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
        ],
    ]) ?>

</div>

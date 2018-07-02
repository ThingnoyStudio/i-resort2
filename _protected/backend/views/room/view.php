<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Room */

$this->title = $model->Rid;
$this->params['breadcrumbs'][] = ['label' => 'ห้องพัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->Rid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->Rid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ต้องการลบรายการนี้หรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Rid',
            'Rname:ntext',
            'Rnumber:ntext',
            'Rprice:ntext',
            'Rdes:ntext',
//            'Rimg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'Rimg',
                'value' => Html::img(Yii::getAlias('@ShowR')  . $model->Rimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'RSid',
        ],
    ]) ?>

</div>

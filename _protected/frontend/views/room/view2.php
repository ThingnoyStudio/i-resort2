<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Room */

$this->title = $model->Rid;
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ทำความสะอาดแล้ว', ['update2', 'id' => $model->Rid], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Rid',
            'Rname:ntext',
            'Rnumber:ntext',
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

    <?= Html::a(Yii::t('app', 'กลับ'), ['room/index3'], ['class' => 'btn btn-danger']) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = $model->Nid;
$this->params['breadcrumbs'][] = ['label' => 'ข่าวสาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->Nid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->Nid], [
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
            'Nid',
            'Ntopic:ntext',
            'Ndes:ntext',
//            'Nimg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'Nimg',
                'value' => Html::img(Yii::getAlias('@ShowN')  . $model->Nimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
        ],
    ]) ?>

</div>

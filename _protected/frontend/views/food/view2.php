<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Food */

$this->title = $model->Fid;
$this->params['breadcrumbs'][] = ['label' => 'Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Fid',
            'Fname:ntext',
            'Fprice:ntext',
//            'Fimg:ntext',
            [
                'format' => 'raw',
                'attribute' => 'Fimg',
                'value' => Html::img(Yii::getAlias('@ShowF')  . $model->Fimg , ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
        ],
    ]) ?>

</div>

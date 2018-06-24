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
    <table>
        <tr>
            <td>
                <?=Html::img(Yii::getAlias('@HeaderIcon'), ['width' => 120])?>
            </td>
            <td>
                <h4>I-Resort</h4>
                <strong><i> มหาวิทยาลัยราชภัฎอุดระานี</i></strong><br />
                <small>Email : systemudon@gmail.com Tel : 0123456789</small>
                <h3>ใบเสร็จ</h3>
            </td>
        </tr>
    </table>

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

</div>

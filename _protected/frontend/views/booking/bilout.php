<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Room */


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
            'Bid',
            'Rname:ntext',
            'Rnumber:ntext',
            'Rdes:ntext',
        ],
    ]) ?>

</div>

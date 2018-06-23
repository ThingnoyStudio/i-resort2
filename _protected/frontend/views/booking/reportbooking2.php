<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">

    <table>
        <tr>
            <td>
                <?=Html::img(Yii::getAlias('@HeaderIcon'), ['width' => 120])?>
            </td>
            <td>
                <h4>I-Resort</h4>
                <strong><i> มหาวิทยาลัยราชภัฎอุดระานี</i></strong><br />
                <small>Email : systemudon@gmail.com Tel : 0123456789</small>
                <h3>รายงานการเข้าพัก</h3>
            </td>
        </tr>
    </table>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'Bdate:ntext',
            'Rid:ntext',
            'room.Rname',
            'users.Ufname:ntext',
            'users.Ulname:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'payment.PMname',
            'Btotal',
        ],
    ]); ?>



</div>

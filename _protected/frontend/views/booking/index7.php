<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานห้องที่มีลูกค้าพักอยู่';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">

    <p>
        <?= Html::a('Print', ['mpdfdemo3'], ['class' => 'btn btn-success']) ?>
    </p>

    <table>
        <tr>
            <td>
                <?=Html::img(Yii::getAlias('@HeaderIcon'), ['width' => 120])?>
            </td>
            <td>
                <h4>I-Resort</h4>
                <strong><i> มหาวิทยาลัยราชภัฎอุดรธานี</i></strong><br />
                <small>Email : systemudon@gmail.com Tel : 0123456789</small>
                <h3>รายงานห้องที่มีลูกค้าพักอยู่</h3>
            </td>
        </tr>
    </table>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'panel'=>[
//            'before'=>' '
//        ],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'Bid',
            'Bdate:ntext',
            'room.Rnumber',
            'room.Rname',
            'users.Ufname',
            'users.Ulname',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'Btotal',
            'payment.PMname',


        ],
    ]); ?>


</div>

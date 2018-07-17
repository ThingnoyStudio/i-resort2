<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$year = explode('=',Url::current())[3];
$str_mount = explode('=',Url::current())[2];
$mount = explode('&',$str_mount)[0];

$this->title = 'รายงานการเข้าพัก';
?>
<table>
    <tr>
        <td>
            <?=Html::img(Yii::getAlias('@HeaderIcon'), ['width' => 120])?>
        </td>
        <td>
            <h4>I-Resort</h4>
            <strong><i> มหาวิทยาลัยราชภัฎอุดระานี</i></strong><br />
            <small>Email : systemudon@gmail.com Tel : 0123456789</small>
            <h3>รายงานการสั่งซื้ออาหาร</h3>
        </td>
    </tr>
</table>
<h2 style="margin-top: unset"><?= Html::encode($this->title) ?></h2>
<span>เดือน <?php if ($mount!=null){echo $mount;}else{echo '-';} ?></span><br>
<span>ปี <?php if ($year!=null){echo $year;}else{echo '-';} ?></span>
<!--<php echo $this->render('_search', ['model' => $searchModel]); ?>-->
<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'Bid',
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

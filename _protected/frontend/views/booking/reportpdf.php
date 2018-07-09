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
<h1><?= Html::encode($this->title) ?></h1>
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

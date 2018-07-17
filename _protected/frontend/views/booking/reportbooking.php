<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานการเข้าพัก';
?>
<h1><?= Html::encode($this->title) ?></h1>
<p>
    <?= Html::a('พิมพ์รายงาน', ['reportbooking?type=pdf&' . explode('?', Url::current())[1]], ['class' => 'btn btn-success']) ?>
</p>

<?php echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="booking-index" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">

    <?php Pjax::begin([ 'enablePushState' => false ]); ?>
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
    <?php Pjax::end(); ?>
</div>

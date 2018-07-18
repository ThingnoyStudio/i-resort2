<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Booking */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs(" function upload() {
   alert('ll');
//  console.log('ff worked! -> '+id);
//  var roomId= id;
//  var price = price;
//  var p = 0;
//  var roomType = rtname;
//  var roomStatus = rsname;
//  var amount = $(\"span[name=days\"+id+\"]\").text();
//  var date = $(\"input[name=kvdate\"+id+\"]\").val();
//  var s_date = date.split(' ')[0];
//  var e_date = date.split(' ')[2];
//  
//  console.log('price: '+price);
//  console.log('amount: '+amount);
//  console.log('date: '+date);
//  console.log('s_date: '+s_date);
//  console.log('e_date: '+e_date);
//  console.log('rtname: '+roomType);
//  
//  console.log('url: '+window.location);
//  if(amount > 0 ){
//
//    . \"roomId=\"+roomId+\"&price=\"+price+\"&amt=\"+amount+\"&sdate=\"+s_date+\"&edate=\"+e_date+\"&p=\"+p+\"&rtname=\"+roomType+\"&rsname=\"+roomStatus;
//
//window.open(url, '_blank');
//  }else{
//  alert('กรุณาเลือกช่วงเวลาที่เข้าพัก')
//  }
  


} ", View::POS_END, 'my-upload');

$this->title = $model->Bid;
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$dateNow = date('Y-m-d');
$NewDate = Date('Y-m-d', strtotime("+3 days"));
if ($NewDate <= $model->Bdatein) {

    ?>
    <p>
        <?= Html::a('ยกเลิกการจอง', ['delete2', 'id' => $model->Bid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ต้องการยกเลิกการจองรายการนี้หรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
}
?>

<?php
if ($model->PMid == "3") {
    ?>
    <div class="booking-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="well text-center"
                     style="min-height: 20px;
                    padding: 19px;
                    margin-bottom: 20px;
                    background-color: #f5f5f5;
                    border: 1px solid #e3e3e3;
                    border-radius: 4px;
                    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
                    <?= Html::img(Yii::getAlias('@ShowBil') . '/' . $model->Bbil, ['style' => 'width:100px;', 'class' => 'img-rounded', 'style' => 'border-radius: 6px;']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'Bbil')->fileInput() ?>
            </div>
        </div>
        <?= Html::a('อัพโหลด', ['upload2', 'id' => $model->Bid], ['class' => 'btn btn-primary', 'onclick' => 'this.parentNode.submit()', 'data-method' => 'post']) ?>
        <?php ActiveForm::end(); ?>
    </div>
    <?php
}
?>
<div class="booking-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'Bid',
            'users.Ufname',
            'users.Ulname',
            'users.Uemail',
            'users.Uphone',
            'Bdate:ntext',
            [
                'format' => 'raw',
                'attribute' => 'room.Rimg',
                'value' => Html::img(Yii::getAlias('@ShowR') . $model->room->Rimg, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
            ],
            'room.Rnumber:ntext',
            'room.Rname',
            'room.Rdes',
//            'Uid:ntext',
//            'ADid:ntext',
            'Bnday:ntext',
            'Bdatein:ntext',
            'Bdateout:ntext',
            'Btotal',
            'payment.PMname',
//            'PMid:ntext',
        ],
    ]) ?>

    <?= Html::a(Yii::t('app', 'กลับ'), ['booking/index4'], ['class' => 'btn btn-default']) ?>

</div>


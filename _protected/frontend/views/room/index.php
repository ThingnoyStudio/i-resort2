<?php

use frontend\assets\AppAssetJs;
use kartik\daterange\DateRangePicker;
//use kartik\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $p yii\data\ActiveDataProvider */

AppAssetJs::register($this);

$addon = <<< HTML
<span class="input-group-addon" style="padding: 10px 18px 10px 0;">
    <i class="material-icons">today</i>
</span>
HTML;

$this->registerJs(" function ff(id,price) {
  // alert('ll');
  console.log('ff worked! -> '+id);
  var roomId= id;
  var price = price;
  var amount = $(\"span[name=days\"+id+\"]\").text();
  var date = $(\"input[name=kvdate\"+id+\"]\").val();
  var s_date = date.split(' ')[0];
  var e_date = date.split(' ')[2];
//  var s_date = start_date.replace(/-|_/g,'');
//  var e_date = end_date.replace(/-|_/g,'');
  
  console.log('price: '+price);
  console.log('amount: '+amount);
  console.log('date: '+date);
//  console.log('start_date: '+start_date);
  console.log('s_date: '+s_date);
//  console.log('end_date: '+end_date);
  console.log('e_date: '+e_date);
  console.log('url: '+window.location);
  if(amount > 0 ){
      window.location.href = \" " . \yii\helpers\Url::to(['paypal/paypal']) . "?roomId=\"+roomId+\"&price=\"+price+\"&amt=\"+amount+\"&sdate=\"+s_date+\"&edate=\"+e_date;

  }else{
  alert('กรุณาเลือกช่วงเวลาที่เข้าพัก')
  }
  


} ", View::POS_END, 'my-options');
$this->registerJs(" function exportPdf(id,price,rtname,rsname) {
  // alert('ll');
  console.log('ff worked! -> '+id);
  var roomId= id;
  var price = price;
  var p = ".$p."
  var roomType = rtname;
  var roomStatus = rsname;
  var amount = $(\"span[name=days\"+id+\"]\").text();
  var date = $(\"input[name=kvdate\"+id+\"]\").val();
  var s_date = date.split(' ')[0];
  var e_date = date.split(' ')[2];
  
  console.log('price: '+price);
  console.log('amount: '+amount);
  console.log('date: '+date);
  console.log('s_date: '+s_date);
  console.log('e_date: '+e_date);
  console.log('rtname: '+roomType);
  
  console.log('url: '+window.location);
  if(amount > 0 ){
      var url = \" " . \yii\helpers\Url::to(['room/pdf'])
    . "?roomId=\"+roomId+\"&price=\"+price+\"&amt=\"+amount+\"&sdate=\"+s_date+\"&edate=\"+e_date+\"&p=\"+p+\"&rtname=\"+roomType+\"&rsname=\"+roomStatus;

//window.open(url, '_blank');
window.open(url, '_self');

  }else{
  alert('กรุณาเลือกช่วงเวลาที่เข้าพัก')
  }
  


} ", View::POS_END, 'my-options2');

//$this->registerJs(" function checkDate(id) {
//  var date = $(\"input[name=kvdate\"+id+\"]\").val();
//  var s_date = date.split(' ')[0];
//  var e_date = date.split(' ')[2];
//      $.ajax({
//       url: '".  Yii::$app->request->baseUrl ."'/paypal/chkdate',
//       type: 'post',
//       data: {
//                 sDate:s_date ,
//                 eDate:e_date ,
//                 _csrf : '". Yii::$app->request->getCsrfToken() ."'
//             },
//       success: function (data) {
//          console.log(data.booking);
//       }
//      });
//
//
//} ", View::POS_LOAD, 'my-options2');

$script = <<< JS
function con() {
    console.log("sss");
  $('.modal.in:visible').modal('hide');
  
}
JS;
$this->registerJs($script, View::POS_END, 'myOption3');

$this->title = 'ห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<php Pjax::begin(['id'=>'content']); ?>-->
<div class="room-index">


    <div class="row">
        <div class="clearfix"></div>

        <?php
        foreach ($dataProvider->models as $model) {
            ?>

            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                <div class="card" data-turbolinks="false">
                    <div class="thumbnail" style="max-height: 232.91px">
                        <img src="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>"
                             data-retina="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>" alt="No Image">

                        <a href="#" class="thumb-cover" data-toggle="modal" data-target="#<?= $model['Rnumber'] ?>"></a>
                        <b class="actions">
                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title="" data-remote="true"
                               href="#" data-original-title="จองห้องพัก" data-toggle="modal"
                               data-target="#<?= $model['Rnumber'] ?>">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </b>

                    </div>
                    <div class="card-info">

                        <a>
                            <h3><span class="badge badge-info"
                                      style="margin-right: 4px"><?= $model['Rnumber'] ?></span><?= $model['Rname'] ?>
                                <div class="time pull-right  premium-product ">
                                    <span class="line-through "
                                          style="text-decoration: line-through;font-size: 18px;color: #777777;">
                                        ฿<?= $model['Rprice'] ?>
                                    </span>
                                    <span class="line-through " style="color: #FF281E;">
                                        ฿<?= $model['Rprice'] - (($model['Rprice'] * $p) / 100) ?>
                                    </span>
                                </div>
                            </h3>

                            <p><?= $model['Rdes'] ?></p>
                        </a>
                        <i class="material-icons"
                           style="top: 1px;font-size: unset;margin-right: 3px;position: relative;">local_offer</i><?= $model['RTname'] ?>
                        <span class="badge badge-primary float-right"><?= $model['RSname'] ?></span>
                    </div>
                </div>

            </div>

            <!-- Modal Core -->
            <div class="modal fade" id="<?= $model['Rnumber'] ?>" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                                    style="font-size: xx-large;">&times;
                            </button>
                            <h4 class="modal-title" id="myModalLabel">จองห้องพัก
                                หมายเลข<?= ' ' . $model['Rnumber'] . ' ' . $model['Rname'] ?></h4>
                        </div>
                        <div class="modal-body">

                            <!-- // order -->
                            <div class="col-xs-12 ">
                                <div class="card" data-turbolinks="false" style="margin: 0px 0px 25px 0px;">
                                    <div class="thumbnail" style="max-height: 158.91px">
                                        <img src="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>"
                                             data-retina="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>"
                                             alt="No Image">
                                    </div>
                                    <div class="card-info">
                                        <a>
                                            <h3>
                                                <span class="badge badge-info" id="roomId"
                                                      style="margin-right: 4px"><?= $model['Rnumber'] ?>
                                                </span>
                                                <?= $model['Rname'] ?>
                                                <div class="time pull-right  premium-product ">
                                                    <span class="line-through "
                                                          style="text-decoration: line-through;font-size: 18px;color: #777777;">
                                                        ฿<?= $model['Rprice'] ?>
                                                    </span>
                                                    <span class="line-through " style="color: #FF281E;">
                                                        ฿<?= $model['Rprice'] - (($model['Rprice'] * $p) / 100) ?>
                                                    </span>
                                                </div>
                                            </h3>

                                            <p style="min-height: unset;"><?= $model['Rdes'] ?></p>
                                        </a>
                                        <i class="material-icons"
                                           style="top: 1px;font-size: unset;margin-right: 3px;position: relative;">local_offer</i><?= $model['RTname'] ?>
                                        <span class="badge badge-primary float-right"><?= $model['RSname'] ?></span>
                                    </div>
                                </div>

                            </div>
                            <!-- // date picker -->
                            <div class="col-12" style="display: flex; align-items: baseline;">
                                <div style="padding-left: 15px"><label for="kvdate3" style="font-size: large">ช่วงวันที่เข้าพัก</label>
                                </div>
                                <div class="col-7">
                                    <?php
                                    $ss = $model['Rnumber'];
                                    $price = $model['Rprice'] - (($model['Rprice'] * $p) / 100);
                                    $total_price = 0;
                                    $callback = new \yii\web\JsExpression(
                                        "function validate (start_date, end_date){ 
                                        var days = Math.floor((end_date - start_date) / (1000 * 60 * 60 * 24)); 
                                        var lday;  
                                          if(days == 0){ lday = 1; $('span[name=\"days" . $ss . "\"]').text(lday);}else{lday = days; $('span[name=\"days" . $ss . "\"]').text(lday);}
                                          $('input[name=\"kvdate" . $ss . "\"]').val(start_date.format('YYYY-MM-DD')+' - '+end_date.format('YYYY-MM-DD')); 
                                          $('span[name=\"price" . $ss . "\"]').text(lday * " . $price . "); 
                                          $('span[name=\"pay" . $ss . "\"]').text('' + lday * " . $price . ");  
                                           
                                           $.ajax({
                                               url: '" . Yii::$app->request->baseUrl . "/paypal/chkdate',
                                               type: 'post',
                                               data: {
                                                         sDate:start_date.format('YYYY-MM-DD') , 
                                                         eDate:end_date.format('YYYY-MM-DD') ,
                                                         roomId:'".$ss."', 
                                                         _csrf : '" . Yii::$app->request->getCsrfToken() . "'
                                                     },
                                               success: function (data) {
                                                  console.log(data);
                                                  if(data.booking.length != 0){
                                                  $('span[name=\"days" . $ss . "\"]').text(0);
                                                  $('input[name=\"kvdate" . $ss . "\"]').val(''); 
                                                  $('span[name=\"price" . $ss . "\"]').text(0); 
                                                  $('span[name=\"pay" . $ss . "\"]').text(0);
                                                  alert('ช่วงเวลานี้ถูกจองไปแล้ว กรุณาเลือกใหม่!');
                                                  }
                                               }
                                              });
                                           
                                        }");
                                    echo '<div class="input-group">';
                                    echo DateRangePicker::widget([
                                            'name' => 'kvdate' . $model['Rnumber'],
                                            'id' => 'kvdate' . $model['Rnumber'],
                                            //                                            'value' => date('d-m-Y') . ' - ' . date('d-m-Y'),
                                            'useWithAddon' => true,
                                            'convertFormat' => true,
                                            'disabled' => true,
                                            'language' => 'th',
                                            'startAttribute' => 'from_date',
                                            'endAttribute' => 'to_date',
                                            //                                            'startInputOptions' => ['value' =>  date('d-m-Y')],
                                            //                                            'endInputOptions' => ['value' =>  date('d-m-Y')],
                                            'pluginEvents' => [
                                                "cancel.daterangepicker" => "function(ev, picker) { 
                                                picker.element[0].children[1].textContent = '';
                                                $(picker.element[0].nextElementSibling).val('').trigger('change'); 
                                                
                                                }",
                                                'apply.daterangepicker' => "function(ev,picker) {
                                                var start_date = picker.startDate;
                                                var end_date = picker.endDate;
                                                validate(start_date, end_date);
                                                " . $callback . "
                                                }",

                                            ],
//                                            'callback' => $callback,
                                            'pluginOptions' => [
                                                'locale' => ['format' => 'd-m-Y'],
                                                'opens' => 'center',
                                                'drops' => 'up',
                                                'minDate' => date('d-m-Y'),
                                            ],
                                        ]) . $addon;
                                    echo '</div>';
                                    ?>
                                </div>
                                <div>
                                    <span name="<?= 'days' . $model['Rnumber'] ?>" style="font-size: large">0</span>
                                    <span style="font-size: large">วัน</span>
                                </div>
                            </div>
                            <div class="col-12" style="display: flex;font-size: x-large;">
                                <div class="col-md-6">ยอดรวมสุทธิ</div>
                                <div class="col-md-6" style="text-align: right;color: #FF281E;font-weight: 500;">
                                    <span>฿</span>
                                    <span name="<?= 'price' . $model['Rnumber'] ?>">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default " data-dismiss="modal" style="    margin-right: .25rem; padding-right: 30px; padding-left: 30px;">ยกเลิก</button>
                            <button class="btn btn-info btn-lg btn-block btn-capital" name="pay<?= $model['Rnumber'] ?>"
                                    onclick="ff(<?= $model['Rnumber'] . ',' . ($model['Rprice'] - (($model['Rprice'] * $p) / 100)) ?>)" style="    margin: 10px 1px;
                                        padding-left: 30px;
                                        width: 100%;">
                                <i class="fab fa-paypal" style="font-size: large; position: absolute; margin-left: -12%;"></i> ชำระเงินทันที ฿
                                <span name="pay<?= $model['Rnumber'] ?>">0</span>
                            </button>
                            <button class="btn btn-success btn-lg btn-block btn-capital" name="pay<?= $model['Rnumber'] ?>"
                                    onclick="exportPdf(<?= $model['Rnumber'] . ',' . ($model['Rprice'] - (($model['Rprice'] * $p) / 100)) . ',\'' . $model['RTname'] .'\'' . ',\'' . $model['RSname'] .'\''    ?>)" style="    margin: 10px 1px;
                                    padding-left: 30px;
                                    width: 100%;">
                                <i class="fa fa-bank"
                                   style="font-size: large; position: absolute; margin-left: -12%;"></i> ชำระเงินผ่านธนาคาร ฿
                                <span name="pay<?= $model['Rnumber'] ?>">0</span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>


        <div class="clearfix"></div>
    </div>


</div>
<!--<php Pjax::end(); ?>-->

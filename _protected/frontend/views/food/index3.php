<?php

use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->registerCss("
//.no-spinners::-webkit-outer-spin-button,
//.no-spinners::-webkit-inner-spin-button {
//    -webkit-appearance: none !important;
//    margin: 0;
//}
//");

$addon = <<< HTML
<span class="input-group-addon" style="padding: 10px 18px 10px 0;">
    <i class="material-icons">today</i>
</span>
HTML;

$this->registerJs(" function ff(id,price) {
  console.log('ff worked! with foodId -> '+id);
  var foodId = id;
  var price = price;
  var amount = $(\"input[name=amt\"+id+\"]\").val();
  var roomId = $(\"select[name=dd\"+id+\"]\").val();
  
  console.log('price: '+price);
  console.log('amount: '+amount);
  console.log('roomId: '+roomId);
  console.log('url: '+window.location);
  if(amount > 0){
      if(roomId > 0){
            window.location.href = \" " . \yii\helpers\Url::to(['paypal/paypalfood']) . "?foodId=\"+foodId+\"&price=\"+price+\"&amt=\"+amount+\"&roomId=\"+roomId;
      }else{
            window.location.href = \" " . \yii\helpers\Url::to(['paypal/paypalfood']) . "?foodId=\"+foodId+\"&price=\"+price+\"&amt=\"+amount+\"&roomId=0\";
      }

  }else{
  alert('กรุณาเลือกจำนวนอาหารอย่างน้อย 1 รายการ')
  }
  


} ", View::POS_END, 'my-options');

$script = <<< JS
function enterAmount(id,price) {
    console.log("id: "+id);
    console.log("price: "+price);
    var amt = $('input[name=\"amt'+ id +'\"]').val();
    if (amt){
        if (amt > 99){
            
            $('input[name=\"amt'+ id +'\"]').val(amt.slice(0,2));
        }else {
            var total_price = price * amt;
            console.log('net: '+total_price);
            console.log("amount: "+amt);
            $('span[name=\"price'+ id +'\"]').text(total_price);
            $('span[name=\"pay'+ id +'\"]').text(total_price);
        }
    }
    
}
JS;
$this->registerJs($script, View::POS_END, 'myOption3');

$this->title = 'อาหาร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-index">


    <div class="row">
        <div class="clearfix"></div>
        <?php
        foreach ($dataProvider->models as $model) {
            ?>

            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                <div class="card" data-turbolinks="false">
                    <div class="thumbnail" style="height: 232.91px">
                        <img src="<?= Yii::getAlias('@ShowF') . $model['Fimg'] ?>"
                             data-retina="<?= Yii::getAlias('@ShowF') . $model['Fimg'] ?>" alt="No Image" style="height: fit-content;
                            width: 100%;
                            background-position: center center;
                            background-repeat: no-repeat;
                            overflow: hidden;
                            min-width: 100%;
                            object-fit: cover;
                            min-height: -webkit-fill-available;
                            left: 50%;
                            position: relative;
                            transform: translateX(-50%);">
                        <a href="#" class="thumb-cover" data-toggle="modal" data-target="#<?= $model['Fname'] ?>"></a>
                        <b class="actions">
                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title="" data-remote="true"
                               href="#" data-original-title="สั่งอาหาร" data-toggle="modal"
                               data-target="#<?= $model['Fname'] ?>">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </b>
                    </div>
                    <div class="card-info">
                        <a>
                            <h3>
                                <span class="badge badge-info" style="margin-right: 4px"></span>
                                <?= $model['Fname'] ?>
                                <div class="time pull-right  premium-product ">
                                    <span class="line-through " style="color: #FF281E;">
                                        ฿<?= $model['Fprice'] ?>
                                    </span>
                                </div>
                            </h3>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Modal Core -->
            <div class="modal fade" id="<?= $model['Fname'] ?>" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                                    style="font-size: xx-large;">&times;
                            </button>
                            <h4 class="modal-title" id="myModalLabel">สั่งอาหาร
                                เมนู<?= ' ' . $model['Fname'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <!-- // order -->
                            <div class="col-xs-12 ">
                                <div class="card" data-turbolinks="false" style="margin: 0px 0px 25px 0px;">
                                    <div class="thumbnail" style="max-height: 158.91px">
                                        <img src="<?= Yii::getAlias('@ShowF') . $model['Fimg'] ?>"
                                             data-retina="<?= Yii::getAlias('@ShowF') . $model['Fimg'] ?>"
                                             alt="No Image">
                                    </div>
                                    <div class="card-info">
                                        <a>
                                            <h3>
                                                <?= $model['Fname'] ?>
                                                <div class="time pull-right  premium-product ">
                                                    <span class="line-through " style="color: #FF281E;">
                                                        ฿<?= ($model['Fprice']) ?>
                                                    </span>
                                                </div>
                                            </h3>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="display: inline-flex; margin-left: 15px; margin-right: 15px;">
                                <!-- // input amount -->
                                <div class="col-6 float-right" style="display: flex; align-items: baseline;">
                                    <div style="padding-left: 0px"><label for="kvdate3"
                                                                          style="font-size: large">จำนวน</label></div>
                                    <div class="col-4"
                                         style="font-size: x-large; padding-right: 1px; padding-left: 1px;">
                                        <input name="<?= 'amt' . $model['Fid'] ?>" min="0" max="999" type="number"
                                               placeholder="" class="form-control"
                                               oninput="enterAmount(<?= $model['Fid'] . ',' . $model['Fprice'] ?>)">
                                    </div>
                                    <span style="font-size: medium">รายการ</span>
                                </div>
                                <!-- // input room -->
                                <div class="col-6" style="display: flex; align-items: baseline;">
                                    <div style="padding-left: 15px"><label for="kvdate3" style="font-size: large">หมายเลขห้อง</label>
                                    </div>
                                    <div class="col-4"
                                         style="font-size: x-large; padding-right: 1px; padding-left: 1px; margin-left:auto; margin-right:0;">
                                        <!--                                        <input name="<= 'amt' . $model['Fid'] ?>" min="0" type="number"  placeholder="" class="form-control no-spinners" oninput="enterAmount(<= $model['Fid'].','.$model['Fprice'] ?>//)">-->
                                        <?= Html::dropDownList('dd' . $model['Fid'], null, \frontend\models\Room::getAll(), ['prompt' => '-- เลือกห้อง --', 'class' => 'form-control']) ?>

                                    </div>
                                </div>
                            </div>


                            <!-- // net price -->
                            <div class="col-12" style="display: flex;font-size: x-large;">
                                <div class="col-md-6">ยอดรวมสุทธิ</div>
                                <div class="col-md-6" style="text-align: right;color: #FF281E;font-weight: 500;">
                                    <span>฿</span>
                                    <span name="<?= 'price' . $model['Fid'] ?>">0</span>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default " data-dismiss="modal" style="    margin-right: .25rem;
    padding-right: 30px;
    padding-left: 30px;">ยกเลิก
                                </button>
                                <button class="btn btn-info btn-lg btn-block btn-capital"
                                        name="pay<?= $model['Fname'] ?>"
                                        onclick="ff(<?= $model['Fid'] . ',' . ($model['Fprice']) ?>)" style="    margin: 10px 1px;
    padding-left: 30px;
    padding-right: 30px;
    width: 100%;">
                                    <i class="fab fa-paypal"
                                       style="font-size: large; position: absolute; margin-left: -7%;"></i>
                                    ชำระเงินทันที ฿
                                    <span name="pay<?= $model['Fid'] ?>">0</span>
                                </button>

                            </div>
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

<?php

use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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

$script = <<< JS
function con() {
    console.log("sss");
  $('.modal.in:visible').modal('hide');
  
}
JS;
$this->registerJs($script, View::POS_END, 'myOption3');

$this->title = 'Foods';
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
                             data-retina="<?= Yii::getAlias('@ShowF') . $model['Fimg'] ?>" alt="No Image">

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

                            <h3><span class="badge badge-info"
                                      style="margin-right: 4px"></span><?= $model['Fname'] ?>
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
                            <h4 class="modal-title" id="myModalLabel">จองห้องพัก
                                หมายเลข<?= ' ' . $model['Fname'] ?></h4>
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
                                                <span class="badge badge-info" id="foodId"
                                                      style="margin-right: 4px"><?= $model['Fid'] ?>
                                                </span>
                                                <?= $model['Fname'] ?>
                                                <div class="time pull-right  premium-product ">

                                                    <span class="line-through " style="color: #FF281E;">
                                                        ฿<?= ($model['Fprice']) ?>
                                                    </span>
                                                </div>
                                            </h3>

                                            <p style="min-height: unset;"><?= $model['Fname'] ?></p>
                                        </a>

                                    </div>
                                </div>

                            </div>

                            <div class="col-12" style="display: flex; align-items: baseline;">
                                <div style="padding-left: 15px"><label for="kvdate3" style="font-size: large">จำนวน</label>
                                </div>
                                <div class="col-8">
                                    <input type="number" value="" placeholder="" class="form-control">
                                </div>
                                <div>
                                    <span name="<?= 'days' . $model['Fname'] ?>" style="font-size: large"></span>
                                    <span style="font-size: large">รายการ</span>
                                </div>
                            </div>


                            <div class="col-12" style="display: flex;font-size: x-large;">
                                <div class="col-md-6">ยอดรวมสุทธิ</div>
                                <div class="col-md-6" style="text-align: right;color: #FF281E;font-weight: 500;">
                                    <span>฿</span>
                                    <span name="<?= 'price' . $model['Fprice'] ?>">0</span>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-default " data-dismiss="modal" style="    margin-right: .25rem;
    padding-right: 30px;
    padding-left: 30px;">ยกเลิก
                                </button>
                                <!--                            <a class="btn btn-info btn-lg btn-block btn-capital" id="dd" name="pay-->
                                <?//= $model['Rnumber'] ?><!--" >-->
                                <!--                                <i class="fab fa-paypal" style="font-size: large; position: absolute; margin-left: -7%;"></i> ชำระเงินทันที ฿-->
                                <!--                                <span id="price">-->
                                <?php //$total_price ?><!--</span>-->
                                <!--                            </a>-->
                                <button class="btn btn-info btn-lg btn-block btn-capital"
                                        name="pay<?= $model['Fname'] ?>"
                                        onclick="ff(<?= $model['Fname'] . ',' . ($model['Fprice']) ?>)" style="    margin: 10px 1px;
    padding-left: 30px;
    padding-right: 30px;
    width: 100%;">
                                    <i class="fab fa-paypal"
                                       style="font-size: large; position: absolute; margin-left: -7%;"></i>
                                    ชำระเงินทันที ฿
                                    <span name="pay<?= $model['Fname'] ?>">0</span>
                                </button>

                                <!--                            <= Html::a('<i class="fab fa-paypal" style="font-size: large; position: absolute; margin-left: -7%;"></i> ชำระเงินทันที ฿<span id="price">' . $total_price."</span>",-->
                                <!--                                ['/paypal/paypal', 'roomId' => $model['Rnumber'],'price'=>$price,'amt'=>44],-->
                                <!--                                ['class' => 'btn btn-info btn-lg btn-block btn-capital',-->
                                <!--                                    'name' => 'pay'. $model['Rnumber'],-->
                                <!--                                    'onclick' => 'ff()',-->
                                <!--                                ])?>-->

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

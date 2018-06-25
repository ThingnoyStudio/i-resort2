<?php

use kartik\daterange\DateRangePicker;
//use kartik\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $p yii\data\ActiveDataProvider */

$addon = <<< HTML
<span class="input-group-addon" style="padding: 10px 18px 10px 0;">
    <i class="material-icons">today</i>
</span>
HTML;

$script = <<< JS
$('#kvdate').on('apply.daterangepicker', function(ev, picker) {
  console.log(picker.startDate.format('YYYY-MM-DD'));
  console.log(picker.endDate.format('YYYY-MM-DD'));
});
// $('.modal').on('hidden', function () {
//   // write your code
//  
// });

function con() {
    console.log("sss");
  $('.modal.in:visible').modal('hide');
}

// $('.modal').modal('hide')

// $(#kvdate).change(function() {
//   alert('kk');
// });

// $('#kvdate').on('input', function() { 
//     console.log("sss");
//     $(this).val() // get the current value of the input field.
// });

//$(function() {
//    // $('input[name="dates"]').dat/erangepicker();
//
//    $('input[name="dates"]').daterangepicker({
//    "startDate": "01/01/2018",
//    "endDate": "04/01/2018",
//    "opens": "center",
//    "drops": "up"
//}, function(start, end, label) {
//  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
//});
//});
//
//
JS;
//$this->registerJs($script, View::POS_END, 'myOption3');

$this->title = 'ห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-index">

    <!--    <h1><= Html::encode($this->title) ?></h1>-->
    <!--    <php  echo $this->render('_search', ['model' => $searchModel]); ?>-->
    <!---->
    <!--    <p>-->
    <!--        <=  Html::a('Create Room', ['create'], ['class' => 'btn btn-success']) ?>-->
    <!--    </p>-->

    <!--    <= GridView::widget([-->
    <!--        'dataProvider' => $dataProvider,-->
    <!--        'filterModel' => $searchModel,-->
    <!--        'columns' => [-->
    <!--            ['class' => 'yii\grid\SerialColumn'],-->
    <!---->
    <!--//            'Rid',-->
    <!--            'Rname:ntext',-->
    <!--            'Rnumber:ntext',-->
    <!--            'Rdes:ntext',-->
    <!--            'Rimg:ntext',-->
    <!--            'RSname',-->
    <!--            'RTname',-->
    <!---->
    <!--//            ['class' => 'yii\grid\ActionColumn'],-->
    <!--        ],-->
    <!--    ]); ?>-->


    <div class="row">
        <div class="clearfix"></div>
        <!--        <div class="col-md-12">-->
        <!--            <div class="landing-title" style="    margin-top: 40px; margin-bottom: 30px;">-->
        <!--                <span class="title" style="    float: left;font-size: 26px;    font-weight: 200;margin: 7px 0;color: #555;">Latest products</span>-->
        <!--            </div>-->
        <!--        </div>-->


        <?php
        foreach ($dataProvider->models as $model) {
            ?>

            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                <div class="card" data-turbolinks="false">
                    <div class="thumbnail" style="max-height: 232.91px">
                        <img src="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>"
                             data-retina="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>" alt="No Image">

                        <a href="#" class="thumb-cover" data-toggle="modal" data-target="#<?= $model['Rnumber'] ?>"></a>

                        <!--                        <div class="details">-->
                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                        <!--                            <div class="numbers">-->
                        <!---->
                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                        <!--                            </div>-->
                        <!--                            <div class="clearfix"></div>-->
                        <!--                        </div>-->

                        <b class="actions">
                            <!--                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip" title=""-->
                            <!--                               data-original-title="รายละเอียด">-->
                            <!--                                <i class="fa fa-align-left"></i>-->
                            <!--                            </a>-->

                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                            <!--                                <i class="fa fa-laptop"></i>-->
                            <!--                            </a>-->
                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title="" data-remote="true"
                               href="#" data-original-title="จองห้องพัก" data-toggle="modal"
                               data-target="#<?= $model['Rnumber'] ?>">
                                <i class="fa fa-shopping-cart"></i>
                            </a>

                        </b>

                    </div>
                    <div class="card-info">

                        <a >

                            <h3><span class="badge badge-info"
                                      style="margin-right: 4px"><?= $model['Rnumber'] ?></span><?= $model['Rname'] ?>
                                <div class="time pull-right  premium-product ">
                                    <span class="line-through "
                                          style="text-decoration: line-through;font-size: 18px;color: #777777;">
                                        ฿<?= $model['Rprice'] ?>
                                    </span>
                                    <span class="line-through " style="color: #FF281E;">
                                        ฿<?= ($model['Rprice'] - $p) ?>
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
                            <div class="col-xs-12 ">
                                <div class="card" data-turbolinks="false" style="margin: 0px 0px 25px 0px;">
                                    <div class="thumbnail" style="max-height: 158.91px">
                                        <img src="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>"
                                             data-retina="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>"
                                             alt="No Image">

                                        <!--                                        <a href="#" class="thumb-cover"></a>-->
                                        <!--                                        <b class="actions">-->
                                        <!--                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title="" data-remote="true"-->
                                        <!--                                               href="#" data-original-title="จองห้องพัก" data-toggle="modal"-->
                                        <!--                                               data-target="#-->
                                        <?//= $model['Rnumber'] ?><!--">-->
                                        <!--                                                <i class="fa fa-shopping-cart"></i>-->
                                        <!--                                            </a>-->

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
                                        ฿<?= ($model['Rprice'] - $p) ?>
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
<!--                            // date picker -->

                            <div class="col-12" style="display: flex; align-items: baseline;">
                                <div style="padding-left: 15px"><label for="kvdate3" style="font-size: large">ช่วงวันที่เข้าพัก</label></div>
                                <div class="col-7">
                                    <?php
                                    $ss = $model['Rnumber'];
                                    $price = $model['Rprice'] - $p;
                                    $total_price =0;
                                    $callback = new \yii\web\JsExpression(
                                            "function(start_date, end_date){ var days = Math.floor((end_date - start_date) / (1000 * 60 * 60 * 24)); var lday;  if(days == 0){ lday = 1; console.log('lday: '+lday); $('span[name=\"days".$ss."\"]').text(lday);}else{lday = days; console.log('lday: '+days); $('span[name=\"days".$ss."\"]').text(lday);}  $('input[name=\"kvdate".$ss."\"]').val(start_date.format('DD-MM-YYYY')+' - '+end_date.format('DD-MM-YYYY')); $('span[name=\"price".$ss."\"]').text(lday * ".$price."); $('a[name=\"pay".$ss."\"]').text('ชำระเงินทันที ฿' + lday * ".$price.");  }");
                                    echo '<div class="input-group">';
                                    echo DateRangePicker::widget([
                                            'name' => 'kvdate'.$model['Rnumber'],
                                            'id' => 'kvdate'.$model['Rnumber'],
                                            'value' => date('d-m-Y').' - '.date('d-m-Y'),
                                            'useWithAddon' => true,
                                            'convertFormat' => true,
                                            'language'=>'th',
                                            'startAttribute' => 'from_date',
                                            'endAttribute' => 'to_date',
//                                            'startInputOptions' => ['value' =>  date('d-m-Y')],
//                                            'endInputOptions' => ['value' =>  date('d-m-Y')],
                                            'callback' => $callback,
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
                                    <span name="<?= 'days' . $model['Rnumber']?>" style="font-size: large"> 1 </span>
                                    <span style="font-size: large">วัน</span>
                                </div>
                            </div>



                            <div class="col-12" style="display: flex;font-size: x-large;">
                                <div class="col-md-6">ยอดรวมสุทธิ</div>
                                <div class="col-md-6"  style="text-align: right;color: #FF281E;font-weight: 500;">
                                    <span>฿</span>
                                    <span name="<?= 'price' . $model['Rnumber']?>">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default " data-dismiss="modal">ยกเลิก</button>
<!--                            <button type="button" class="btn btn-info " id="dd" data-toggle="modal" data-target="#boy">ชำระเงิน</button>-->
                            <?= Html::a('ชำระเงินทันที ฿<span id="price">' . $total_price."</span>",
                                ['/paypal/paypal', 'roomId' => $model['Rnumber'],'price'=>333,'amount'=>3],
                                ['class' => 'btn btn-success btn-lg btn-block btn-capital',
                                    'name' => 'pay'. $model['Rnumber'],
                                ])?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>


        <div class="clearfix"></div>
    </div>

    <!-- Modal Core -->
    <div class="modal fade" id="boy" tabindex="-1" role="dialog"
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info " id="dd" data-dismiss="modal" onclick="con()">Save</button>
                </div>
            </div>
        </div>
    </div>


</div>

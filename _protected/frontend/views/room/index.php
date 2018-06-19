<?php

use kartik\daterange\DateRangePicker;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $p yii\data\ActiveDataProvider */

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

            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 " >
                <div class="card" data-turbolinks="false">
                    <div class="thumbnail" style="max-height: 232.91px">
                        <img src="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>"
                             data-retina="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>" alt="No Image">

                        <a href="#" class="thumb-cover"></a>

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

                        <a href="#">

                            <h3><span class="badge badge-info"
                                      style="margin-right: 4px"><?= $model['Rnumber'] ?></span><?= $model['Rname'] ?>
                                <div class="time pull-right  premium-product ">
                                    <span class="line-through " style="text-decoration: line-through;font-size: 18px;color: #777777;">
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


                            <div class="col-xs-12 " >
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail" style="max-height: 232.91px">
                                        <img src="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>"
                                             data-retina="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>" alt="No Image">

<!--                                        <a href="#" class="thumb-cover"></a>-->
<!--                                        <b class="actions">-->
<!--                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title="" data-remote="true"-->
<!--                                               href="#" data-original-title="จองห้องพัก" data-toggle="modal"-->
<!--                                               data-target="#--><?//= $model['Rnumber'] ?><!--">-->
<!--                                                <i class="fa fa-shopping-cart"></i>-->
<!--                                            </a>-->

                                        </b>

                                    </div>
                                    <div class="card-info">

                                        <a>

                                            <h3><span class="badge badge-info"
                                                      style="margin-right: 4px"><?= $model['Rnumber'] ?></span><?= $model['Rname'] ?>
                                                <div class="time pull-right  premium-product ">
                                    <span class="line-through " style="text-decoration: line-through;font-size: 18px;color: #777777;">
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
                            // ใส่ ตรงนี้

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info btn-simple">Save</button>
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

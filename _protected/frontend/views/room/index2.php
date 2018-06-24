<?php

use kartik\daterange\DateRangePicker;
//use kartik\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $p yii\data\ActiveDataProvider */

$addon = <<< HTML
<span class="input-group-addon">
   <i class="material-icons">today</i>
</span>
HTML;

$this->title = 'ห้องพัก';
$this->params['breadcrumbs'][] = $this->title;
?>
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

                        <b class="actions">
                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title="" data-remote="true"
                               href="#" data-original-title="จัดการ" data-toggle="modal"
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
                            // ใส่ ตรงนี้


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info ">Save</button>
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

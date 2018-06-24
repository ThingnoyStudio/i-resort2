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

                        <a href="#" class="thumb-cover"></a>
                        <b class="actions">
                            <a href="<?= yii\helpers\Url::to(['/room/updatestatus','id' =>$model['Rid']]) ?>" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                               title=""
                               data-original-title="รายละเอียด">
                                <i class="material-icons">
                                    sort
                                </i>
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

            <?php
        }
        ?>


        <div class="clearfix"></div>
    </div>



</div>

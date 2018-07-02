<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PromotionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'โปรโมชั่น';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-index">

    <h1 style="margin-bottom: unset"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="clearfix"></div>

        <?php
        //    $newQuery = clone $dataProvider->query;
        //    $model = $newQuery->limit(1)->one();
        foreach ($dataProvider->models as $myModel) {
            ?>
            <!--            <div class="col-md-10 ml-auto mr-auto">-->
            <div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 ">
                <div class="card" data-turbolinks="false">
                    <div class="thumbnail" style="max-height: 232.91px">
                        <img src="<?= Yii::getAlias('@ShowP') . $myModel['Pimg'] ?>"
                             data-retina="<?= Yii::getAlias('@ShowP') . $myModel['Pimg'] ?>"
                             alt="No Image">

                    </div>
                    <div class="card-info">
                        <div class="row">
                            <div class="col-6">
                                <h3><?= $myModel['Pname'] ?> </h3>
                                <p style="min-height: unset"><b>วันที่เริ่มต้น: </b><?= $myModel['Pdatestart'] ?> </p>
                                <p style="min-height: unset"><b>วันที่สิ้นสุด: </b><?= $myModel['Pdateend'] ?> </p>
                            </div>
                            <div class="col-6" style="align-items: center; display: flex;">
                                <h1 class="line-through " style="color: #FF281E; font-size: -webkit-xxx-large; margin-bottom: unset">
                                    <b>ลด <?= ($myModel['Pdistant']) ?> %</b>
                                </h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php
        }
        ?>


    </div>
</div>

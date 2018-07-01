<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PromotionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promotions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>





    <div class="row">
        <div class="clearfix"></div>

        <?php
        //    $newQuery = clone $dataProvider->query;
        //    $model = $newQuery->limit(1)->one();
        foreach( $dataProvider->models as $myModel) {
            ?>
            <!--            <div class="col-md-10 ml-auto mr-auto">-->
            <div class="col-xs-12 col-sm-6  col-md-6 col-lg-6 ">
                <div class="card" data-turbolinks="false">
                    <div class="thumbnail" style="max-height: 232.91px">
                        <img src="<?= Yii::getAlias('@ShowP') . $myModel['Pimg'] ?>"
                             data-retina="<?= Yii::getAlias('@ShowP') . $myModel['Pimg']  ?>"
                             alt="No Image">

                        <a href="#" class="thumb-cover"></a>
                        <b class="actions">

                        </b>

                    </div>
                    <div class="card-info">


                            <h3><?=
                                $myModel['Pname']
                                ?>
                            </h3>

                            <p>วันที่เริ่มต้น<?=
                                $myModel['Pdatestart']
                                ?> </p>
                            <p>วันที่สิ้นสุด<?=
                                $myModel['Pdateend']
                                ?> </p>
                        </a>

                        <span class="line-through " style="color: #FF281E;">
                                       ลด <?= ($myModel['Pdistant']) ?>  %
                                    </span>

                    </div>
                </div>
            </div>

            <?php
        }
        ?>


    </div>
</div>

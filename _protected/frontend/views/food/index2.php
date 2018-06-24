<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
                    <div class="thumbnail" style="height: 200px">
                        <img src="<?= Yii::getAlias('@ShowF') . $model['Fimg'] ?>"
                             data-retina="<?= Yii::getAlias('@ShowF') . $model['Fimg'] ?>" alt="No Image">

                        <a href="#" class="thumb-cover"></a>
                        <b class="actions">
                            <a href="<?= yii\helpers\Url::to(['/food/view2','id' =>$model['Fid']]) ?>" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
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
                                      style="margin-right: 4px"></span><?= $model['Fname'] ?>
                                <div class="time pull-right  premium-product ">

                                    <span class="line-through " style="color: #FF281E;">
                                        ฿<?= ($model['Fprice'] ) ?>
                                    </span>
                                </div>
                            </h3>


                        </a>

                    </div>
                </div>

            </div>

            <?php
        }
        ?>


        <div class="clearfix"></div>
    </div>

</div>

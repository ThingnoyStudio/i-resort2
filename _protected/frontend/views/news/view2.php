<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\News */

$this->title = $model->Ntopic;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($model->Ntopic) ?></h1>


    <div class="row">
        <div class="clearfix"></div>
<!--    <div class="col-xs-12 col-sm-6   ">-->
        <div class="card" data-turbolinks="false">
            <div class="thumbnail" >
                <img src="<?= Yii::getAlias('@ShowN') . $model->Nimg ?>"
                     data-retina="<?= Yii::getAlias('@ShowN') .$model->Nimg  ?>"
                     alt="No Image">


            </div>
            <div class="card-info">


                    <h3><?=
                        $model->Ntopic;
                        ?>
                    </h3>

                <br><br>

                <object width="420" height="315"
                        data="<?=
                        $model->Nvdo;
                        ?>">
                </object>
                <br>

                    <p><?=
                        $model->Ndes;
                        ?> </p>


            </div>
        </div>
<!--    </div>-->
    </div>

</div>

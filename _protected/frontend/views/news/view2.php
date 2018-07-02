<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\News */

$this->title = $model->Ntopic;
$this->params['breadcrumbs'][] = ['label' => 'ข่าวสาร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view" style="margin: 12px 12%;">

<!--    <h1 style="margin-bottom: -15px"><= Html::encode($model->Ntopic) ?></h1>-->


    <div class="row">
        <div class="clearfix"></div>
            <div class="col-xs-12">
        <div class="card" data-turbolinks="false">
            <div class="thumbnail">
                <img src="<?= Yii::getAlias('@ShowN') . $model->Nimg ?>"
                     data-retina="<?= Yii::getAlias('@ShowN') . $model->Nimg ?>"
                     alt="No Image">


            </div>
            <div class="card-info">
                <h2><?= $model->Ntopic; ?></h2>

<div style="padding: 0% 9%;">
    <iframe width="800" height="315" src="<?= $model->Nvdo; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="max-width: 100%;margin-left: 0.5%;">
    </iframe>
</div>



                <br>
                <p style="margin-top: 12px;"><?=$model->Ndes;?> </p>
            </div>
        </div>
            </div>
        <div class="clearfix"></div>
    </div>

</div>

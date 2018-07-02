<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข่าวสาร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1 style="margin-bottom: unset"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        = Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>

<!--    = GridView::widget([-->
<!--        'dataProvider' => $dataProvider,-->
<!--        'filterModel' => $searchModel,-->
<!--        'columns' => [-->
<!--            ['class' => 'yii\grid\SerialColumn'],-->
<!---->
<!--            'Nid',-->
<!--            'Ntopic:ntext',-->
<!--            'Ndes:ntext',-->
<!--            'Nimg:ntext',-->
<!---->
<!--            ['class' => 'yii\grid\ActionColumn'],-->
<!--        ],-->
<!--    ]); ?>-->


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
                <div class="thumbnail" style="height: 232.91px">
                    <img src="<?= Yii::getAlias('@ShowN') . $myModel['Nimg'] ?>"
                         data-retina="<?= Yii::getAlias('@ShowN') . $myModel['Nimg']  ?>"
                         alt="No Image" style="height: fit-content;
                            width: 100%;
                            background-position: center center;
                            background-repeat: no-repeat;
                            overflow: hidden;
                            min-width: 100%;
                            object-fit: cover;
                            min-height: -webkit-fill-available;
                            left: 50%;
                            position: relative;
                            transform: translateX(-50%);">

                    <a href="<?= yii\helpers\Url::to(['/news/view2','id' =>$myModel['Nid']]) ?>" class="thumb-cover"></a>
                    <b class="actions">
                        <a href="<?= yii\helpers\Url::to(['/news/view2','id' =>$myModel['Nid']]) ?>" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                           title=""
                           data-original-title="อ่านข่าว">
                            <i class="fa fa-align-left"></i>
                        </a>
                       </b>

                </div>
                <div class="card-info">
                    <a>
                        <h3><?=$myModel['Ntopic'] ?> </h3>
                        <p style="min-height: unset"><?= $myModel['Ndes'] ?> </p>
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

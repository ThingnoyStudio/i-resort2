<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
                <div class="thumbnail" style="max-height: 232.91px">
                    <img src="<?= Yii::getAlias('@ShowN') . $myModel['Nimg'] ?>"
                         data-retina="<?= Yii::getAlias('@ShowN') . $myModel['Nimg']  ?>"
                         alt="No Image">

                    <a href="#" class="thumb-cover"></a>
                    <b class="actions">
                        <a href="<?= yii\helpers\Url::to(['/news/view2','id' =>$myModel['Nid']]) ?>" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                           title=""
                           data-original-title="รายละเอียด">
                            <i class="fa fa-align-left"></i>
                        </a>
                       </b>

                </div>
                <div class="card-info">

                    <a href="<?= yii\helpers\Url::to(['/news/view2','id' =>$myModel['Nid']]) ?>">
                        <h3><?=
                            $myModel['Ntopic']
                            ?>
                        </h3>

                        <p><?=
                            $myModel['Ndes']
                            ?> </p>
                    </a>

                </div>
            </div>
        </div>

        <?php
    }
    ?>


    </div>

</div>

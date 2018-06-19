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
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Nid',
            'Ntopic:ntext',
            'Ndes:ntext',
            'Nimg:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



        <div class="col-md-6 ml-auto mr-auto">
            <h4 class="title text-center">บริการของเรา</h4>
            <div class="nav-align-center">
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#room" role="tablist">
                            <i class="fas fa-bed"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#food" role="tablist">
                            <!--                                <i class=" glyphicon-cutlery"></i>-->
                            <i class="fas fa-utensils"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

</div>

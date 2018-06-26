<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerCss("
.widget-user-2 .widget-user-image>img {
    width: 81px;
    height: 81px;
    float: left;
    margin-top: -9px;
    border: 3px solid #fff;
}
.widget-user-2 .widget-user-username, .widget-user-2 .widget-user-desc {
    margin-left: 99px;
}
.badge{
      font-size: 16px;
}


");


$this->title = 'บัญชีผู้ใช้';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="row">
        <?php
        // $models = $dataProvider->models;
        foreach ($dataProvider->models as $model) {
            ?>
            <!-- <div class="col-md-4"></div> -->
            <div class="col-lg-6 col-lg-offset-3" >
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-yellow">
                        <div class="widget-user-image">
                            <img class="img-circle"
                                 src="<?= Yii::getAlias('@ShowU') . '/' . Yii::$app->user->identity->users->Uimg ?>"
                                 alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username"><?= print_r($model->username, true); ?></h3>
                        <h5 class="widget-user-desc"><i class="fa fa-circle text-success"></i> &nbsp;online</h5>
                        <div class="pull-right" style="    margin-top: -21px;">
                            <div class="form-group">
                                <!-- Html::a('<i class="glyphicon glyphicon-pencil"></i>',$url,
                                ['title'=>'Edit user',
                                'class'=>'btn btn-warning']); -->
                                <?= Html::a('<i class="glyphicon glyphicon-pencil"> </i> ' . Yii::t('app', 'แก้ไขบัญชี'), ['user/update', 'id' => print_r($model->id, true)], ['title' => 'Edit user',
                                    'class' => 'btn btn-success']); ?>
                                <?= Html::a('<i class="glyphicon glyphicon-pencil"> </i> ' . Yii::t('app', 'เปลี่ยนรหัสผ่าน'), ['site/changepassword'], ['title' => 'Edit user',
                                    'class' => 'btn btn-success-outline']); ?>
                                <!-- <?= Html::a(Yii::t('app', 'ยกเลิก'), ['user/index'], ['class' => 'btn btn-primary-outline']) ?> -->
                            </div>
                        </div>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="#">ชื่อผู้ใช้: <span
                                            class="pull-right badge badge-info" style="margin-left: 6px"><?= print_r($model->username, true) ?></span></a>
                            </li>
                            <li><a href="#">อีเมล์: <span
                                            class="pull-right badge badge-info" style="margin-left: 6px"><?= print_r($model->email, true) ?></span></a>
                            </li>
                            <!-- <li><a href="#">ที่อยู่: <span class="pull-right badge bg-blue"><= print_r($model->address,true) ?></span></a></li> -->
                            <!-- <li><a href="#">เบอร์โทร: <span class="pull-right badge bg-aqua"><= print_r($model->phone,true) ?></span></a></li> -->

                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <?php
        }
        ?>
        <!-- <div class="col-md-4 "></div> -->
    </div>
    <!-- /.row -->


</div>

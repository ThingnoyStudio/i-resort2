<?php
use frontend\assets\AppAsset;
// use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
// use yii\bootstrap\Nav;
// use yii\bootstrap\NavBar;
// use yii\widgets\Breadcrumbs;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
// $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@themes/material');


?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= Yii::getAlias('@favicon')?>" type="image/x-icon" />
    <?php $this->head() ?>

<body id="mybody">
<?php $this->beginBody() ?>


<nav class="navbar filter-bar navbar-fixed-top filled">
    <div class="container">
        <!--        <div class="notification">-->
        <!--            <div id="notif-message" class="notif-message" style="display: none;" notice-type="success">-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div data-no-turbolink="">
                <a href="<?= Url::to(['/site/index']) ?>" class="navbar-brand">
                    <div class="logo">
                        <img src="<?= Yii::getAlias('@HeaderIcon')?>" width="60" height="60">
                    </div>
                    <p style="font-size: x-large">I-Resort resort & restaurant</p>
                </a>
            </div>

        </div>

    </div>

</nav>



<div class="wrapper" style="margin-top: 64px;">

    <div class="sidebar" data-color="purple" data-image="<?= Yii::getAlias('@uploadUrl').'/img/sidebar-1.jpg' ?>">

        <!--			<div class="logo">-->
        <!--                <= Html::a("<i class=\"fa fa-line-chart\"></i> " . Yii::t('app', 'ระบบพยากรณ์ ผู้ป่วยมะเร็งฯ'),-->
        <!--                    ['index'],-->
        <!--                    [-->
        <!--                        'class' => 'simple-text',-->
        <!--                    ]) ?>-->
        <!--			</div>-->

        <?php $navbarbrand = 'Material Dashboard'; ?>


        <!-- left -->
        <?=	$this->render(
            'left.php'
        // ['directoryAsset' => $directoryAsset]
        )
        ?>

    </div>

    <div class="main-panel">


        <!-- header -->
        <?= $this->render(
            'header.php',
            ['navbarbrand' => $navbarbrand]
        ) ?>


        <!-- content & footer -->
        <?= $this->render(
            'content.php',
            ['content' => $content]
        ) ?>



    </div>
</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

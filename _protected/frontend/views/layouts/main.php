<?php
use frontend\assets\AppAsset;
// use frontend\widgets\Alert;
use yii\helpers\Html;
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
    <link rel="shortcut icon" href="<?php echo Yii::$app->getHomeUrl(); ?>/favicon.ico?v=1" type="image/x-icon" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

<body id="mybody">
<?php $this->beginBody() ?>
<div class="wrapper">

    <div class="sidebar" data-color="purple" data-image="<?= Yii::getAlias('@uploadUrl').'/img/sidebar-1.jpg' ?>">
        <!--
               Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo">
            <a href="#" class="simple-text">
                I Resort
            </a>
        </div>

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

<?php

use frontend\assets\AppAsset;
// use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= Yii::getAlias('@favicon') ?>" type="image/x-icon"/>
    <?php $this->head() ?>

<body class="profile-page sidebar-collapse" id="mybody">
<?php $this->beginBody() ?>

<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

<!-- header -->
<?= $this->render(
    'header.php'
//            ['navbarbrand' => $navbarbrand]
) ?>


<div class="wrapper">

    <div class="page-header page-header-small" filter-color="orange" style="min-height: unset">
        <div class="page-header-image" data-parallax="true"
             style="background-image: url('<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>');">
        </div>
        <div class="container">
            <div class="content-center">

                <h1 class="title">อัย-รีสอร์ท</h1>
                <p class="category" style="color: rgba(255, 255, 255, 0.9);">บริการจองห้องพัก และ ภัตตาคาร ด้วยรางวัลการันตีระดับ 5 ดาว</p>

            </div>
        </div>
    </div>


    <!--     content & footer -->
<!--    <php Pjax::begin(['id'=>'content','enablePushState' => false,]); ?>-->

    <?= $this->render(
        'content.php',
        ['content' => $content]
    ) ?>
<!--    <php Pjax::end(); ?>-->

</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

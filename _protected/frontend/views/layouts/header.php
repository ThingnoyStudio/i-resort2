<?php

use frontend\models\Users;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="35">
    <div class="container">
        <div class="dropdown button-dropdown">
            <!--            <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">-->
            <!--                <span class="button-bar"></span>-->
            <!--                <span class="button-bar"></span>-->
            <!--                <span class="button-bar"></span>-->
            <!--            </a>-->
            <a href="<?= yii\helpers\Url::to(['/site/index']) ?>" class="navbar-brand">
                <div class="logo" style="    border-radius: 50%;
    border: 1px solid #333;
    display: block;
    height: 46px;
    width: 46px;
    float: left;
    overflow: hidden;
    background: white;">
                    <img src="<?= Yii::getAlias('@HeaderIcon') ?>" width="60" height="60">
                </div>
                <!--                <p style="font-size: x-large">ระบบพยากรณ์ ผู้ป่วยมะเร็งและเนื้องอกในประเทศไทย</p>-->
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-header">Dropdown header</a>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">One more separated link</a>
            </div>
        </div>
        <div class="navbar-translate">
            <a class="navbar-brand" href="#" rel="tooltip"
               title="Resort management system" data-placement="bottom" target="" style="font-size: 1.4571em;">
                <?= Html::encode($this->title) ?>
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>

        <ul class="collapse navbar-collapse justify-content-end" id="navigation"
            data-nav-image="<?= Yii::getAlias('@UploadsImg') . '/blurred-image-1.jpg' ?>" style="    margin-top: 0;
    margin-bottom: -1rem;">

            <ul class="navbar-nav">

                <?php
                if (Yii::$app->user->isGuest) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="หน้าหลัก" data-placement="bottom"
                           href="<?= yii\helpers\Url::to(['/site/index']) ?>"
                           target="">
                            <i class="material-icons">home</i>
                            <p class="d-lg-none d-xl-none">หน้าหลัก</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="จองห้องพัก" data-placement="bottom"
                           href="<?= yii\helpers\Url::to(['/room/index']) ?>"
                           target="">
                            <i class="material-icons">hotel</i>
                            <p class="d-lg-none d-xl-none">ห้องพัก</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="สั่งอาหาร" data-placement="bottom"
                           href="<?= yii\helpers\Url::to(['/food/index2']) ?>"
                           target="">
                            <i class="material-icons">room_service</i>
                            <p class="d-lg-none d-xl-none">อาหาร</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="ข่าวสารเกี่ยวกับ อัยรีสอร์ท" data-placement="bottom"
                           href="<?= yii\helpers\Url::to(['/news/index']) ?>"
                           target="">
                            <i class="material-icons">library_books</i>
                            <p class="d-lg-none d-xl-none">ข่าวสาร</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="โปรโมชั่น" data-placement="bottom"
                           href="<?= yii\helpers\Url::to(['/promotion/index2']) ?>"
                           target="">
                            <i class="material-icons">notifications</i>
                            <p class="d-lg-none d-xl-none">โปรโมชั่น</p>
                        </a>
                    </li>
                    <?php
                } else {
                    $Usatatus = Users::findOne(Yii::$app->user->id);
//                    echo print_r($Usatatus->Uemail);
                    if ($Usatatus->USid == 1) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="หน้าหลัก" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/site/index']) ?>"
                               target="">
                                <i class="material-icons">home</i>
                                <p class="d-lg-none d-xl-none">หน้าหลัก</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="จองห้องพัก" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/room/index']) ?>"
                               target="">
                                <i class="material-icons">hotel</i>
                                <p class="d-lg-none d-xl-none">ห้องพัก</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="สั่งอาหาร" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/food/index2']) ?>"
                               target="">
                                <i class="material-icons">room_service</i>
                                <p class="d-lg-none d-xl-none">อาหาร</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="ข่าวสารเกี่ยวกับ อัยรีสอร์ท"
                               data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/news/index']) ?>"
                               target="">
                                <i class="material-icons">library_books</i>
                                <p class="d-lg-none d-xl-none">ข่าวสาร</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="โปรโมชั่น" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/promotion/index2']) ?>"
                               target="">
                                <i class="material-icons">notifications</i>
                                <p class="d-lg-none d-xl-none">โปรโมชั่น</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="ประวัติการทำรายการ" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/promotion/index']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">ประวัติการทำรายการ</p>
                            </a>
                        </li>
                        <?php
                    } else if ($Usatatus->USid == 2) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="รายงานการเข้าพัก" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/booking/reportbooking']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">รายงานการเข้าพัก</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="รายงานการสั่งซื้ออาหาร" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/orders/index2']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">รายงานการสั่งซื้ออาหาร</p>
                            </a>
                        </li>
                        <?php
                    } else if ($Usatatus->USid == 3) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="ข้อมูลลูกค้า" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/users/index']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">ข้อมูลลูกค้า</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="ข้อมูลการเข้าพัก" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/booking/index']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">ข้อมูลการเข้าพัก</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="ห้องพัก" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/room/index']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">ห้องพัก</p>
                            </a>
                        </li>
                        <?php
                    } else if ($Usatatus->USid == 4) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="ห้องพัก" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/room/index']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">ห้องพัก</p>
                            </a>
                        </li>
                        <?php
                    } else if ($Usatatus->USid == 5) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="จัดการข้อมูลอาหาร" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/food/index']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">จัดการข้อมูลอาหาร</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="การสั่งซื้อ" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/orders/index']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">การสั่งซื้อ</p>
                            </a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="จัดการห้องพัก" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/room/index2']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">จัดการห้องพัก</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="จัดการห้องพัก" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/promotion/index3']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">จัดการโปรโมชั่น</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="จัดการห้องพัก" data-placement="bottom"
                               href="<?= yii\helpers\Url::to(['/order/index4']) ?>"
                               target="">
                                <i class="material-icons">assignment</i>
                                <p class="d-lg-none d-xl-none">รายงานค่าอาหาร</p>
                            </a>
                        </li>
                        <?php
                    } //else
                    ?>
                    <?php
                } //else
                ?>

                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       style="font-size: small;padding: 0.5rem 0.7rem;display: block;">

                        <img src="<?= Yii::getAlias('@ShowUde') ?>" class="img" alt="User Image" style="    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;"/>
                        <?php
                        if (Yii::$app->user->isGuest) {
                            ?>

                            <span>กรุณาเข้าสู่ระบบ</span>
                            <?php
                        } else {
                            ?>

                            <span><?= Yii::$app->user->identity->username ?></span>

                            <?php
                        } //else
                        ?>
                    </a>
                    <ul class="dropdown-menu" style="width: 200px; padding: 4px 9px">

                        <li class="user-header">
                            <div class="card card-profile" style="box-shadow: unset;padding: 0px 12px;display: unset">
                                <div class="card-avatar" style="max-width: 88px;">
                                    <a href="#pablo">
                                        <img class="img" src="<?= Yii::getAlias('@ShowUde') ?>"
                                             style="    border-radius: 50%;"/>

                                    </a>
                                </div>


                                <?php
                                if (Yii::$app->user->isGuest) {
                                    ?>

                                    <div class="content">
                                        <h6 class="category text-gray">คุณยังไม่ได้เข้าสู่ระบบ</h6>
                                        <h4 class="card-title">Guest User</h4>

                                        <div class="pull-left" style="display:display: -webkit-inline-box;">
                                            <?= Html::a(
                                                'สมัครสมาชิก',
                                                ['/site/signup'],
                                                ['data-method' => 'post', 'class' => 'btn btn-primary btn-round', 'style' => 'padding: 9px 13px;']
                                            ) ?>
                                        </div>
                                        <div class="pull-right">
                                            <?= Html::a(
                                                'เข้าสู่ระบบ',
                                                ['/site/login'],
                                                ['data-method' => 'post', 'class' => 'btn btn-primary btn-round', 'style' => 'padding: 9px 13px;']
                                            ) ?>
                                        </div>
                                    </div>
                                    <!-- $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
                                    $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']]; -->


                                    <?php
                                } else {
                                    ?>


                                    <div class="content">
                                        <h6 class="category text-gray">ยินดีต้อนรับ</h6>
                                        <h4 class="card-title"><?= Yii::$app->user->identity->username ?></h4>

                                        <div class="pull-left">
                                            <?= Html::a(
                                                'โปรไฟล์',
                                                ['/user/index'],
                                                ['data-method' => 'post', 'class' => 'btn btn-primary btn-round', 'style' => 'padding: 9px 17px;']
                                            ) ?>
                                        </div>
                                        <div class="pull-right">
                                            <?= Html::a(
                                                'ออกจากระบบ',
                                                ['/site/logout'],
                                                ['data-method' => 'post', 'class' => 'btn btn-primary btn-round', 'style' => 'padding: 9px 11px;']
                                            ) ?>
                                        </div>
                                    </div>
                                    <?php
                                } //else
                                ?>


                            </div>
                        </li>

                    </ul>
                </li>


            </ul>
    </div>
    </div>
</nav>
<!-- End Navbar -->

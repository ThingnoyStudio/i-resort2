<?php
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
                    <img src="<?= Yii::getAlias('@HeaderIcon')?>" width="60" height="60">
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

        <!--        <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">-->
        <div class="collapse navbar-collapse justify-content-end" id="navigation"
             data-nav-image="<?= Yii::getAlias('@UploadsImg') . '/blurred-image-1.jpg' ?>">

            <ul class="navbar-nav">
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Back to Kit</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Have an issue?</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="#"-->
<!--                       target="_blank">-->
<!--                        <i class="fa fa-twitter"></i>-->
<!--                        <p class="d-lg-none d-xl-none">Twitter</p>-->
<!--                    </a>-->
<!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="หน้าหลัก" data-placement="bottom" href="#"
                       target="">
                        <i class="fa fa-home" style="font-size: 21px;"></i>
                        <p class="d-lg-none d-xl-none">หน้าหลัก</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="ข่าวเกี่ยวกับ อัยรีสอร์ท" data-placement="bottom" href="#"
                       target="">
                        <i class="now-ui-icons files_single-copy-04"></i>
                        <p class="d-lg-none d-xl-none">ข่าวสาร</p>
                    </a>
                </li>
<li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="โปรโมชั่น" data-placement="bottom" href="#"
                       target="">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p class="d-lg-none d-xl-none">โปรโมชั่น</p>
                    </a>
                </li>

<!--                <li class="noty-cart" data-turbolinks="false">-->
<!--                    <button class="btn btn-primary btn-simple">-->
<!--                        <i class="now-ui-icons ui-2_favourite-28"></i> With Icon-->
<!--                    </button>-->
<!--                </li>-->



                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-expanded="false" style="text-transform: unset;font-size: small">
<!--                        <i class="now-ui-icons ui-1_settings-gear-63" aria-hidden="true"></i>-->
                        <i class="now-ui-icons users_single-02" aria-hidden="true"></i>
                        <span style="text-transform: unset !important;">test user</span>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-header">จัดการข้อมูลส่วนตัว</a>
                        <a class="dropdown-item" href="#">โปรไฟล์</a>
                        <a class="dropdown-item" href="#">ประวัติการทำรายการ</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">ออกจากระบบ</a>
                    </div>
                </li>


            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

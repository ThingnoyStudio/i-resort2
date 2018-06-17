<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<nav class="navbar navbar-transparent navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="navbarbrand" href="#"><?= Html::encode($this->title) ?></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">


        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <img src="<?= Yii::getAlias('@ShowUde') ?>" class="img" alt="User Image" style="    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;"/>
              <?php
               if (Yii::$app->user->isGuest){
                ?>
                <!-- <p class="hidden-lg hidden-md">Alexander Pierce</p> -->
                <span>กรุณาเข้าสู่ระบบ</span>
                <?php
              }else{
                  ?>

                  <span><?= Yii::$app->user->identity->username ?></span>

                  <?php
                } //else
                  ?>
            </a>
            <ul class="dropdown-menu" style="width: 240px;">

                <li class="user-header">
                  <div class="card card-profile" style="box-shadow: unset;padding: 0px 12px;">
      							<div class="card-avatar" style="max-width: 88px;">
      								<a href="#pablo">
      									<img class="img" src="<?= Yii::getAlias('@ShowUde') ?>" style="    border-radius: 50%;"/>

      								</a>
      							</div>


                    <?php
                     if (Yii::$app->user->isGuest){
                      ?>

                      <div class="content">
         								<h6 class="category text-gray">คุณยังไม่ได้เข้าสู่ระบบ</h6>
         								<h4 class="card-title">Guest User</h4>

                         <div class="pull-left">
                           <?= Html::a(
                               'สมัคร',
                               ['/site/signup'],
                               ['data-method' => 'post', 'class' => 'btn btn-primary btn-round','style'=>'padding: 12px 25px;']
                           ) ?>
                         </div>
                         <div class="pull-right">
                             <?= Html::a(
                                 'เข้าสู่ระบบ',
                                 ['/site/login'],
                                 ['data-method' => 'post', 'class' => 'btn btn-primary btn-round','style'=>'padding: 12px 25px;']
                             ) ?>
                         </div>
     							   </div>
                        <!-- $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
                        $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']]; -->


                    <?php
                  }else{
                      ?>


                      <div class="content">
         								<h6 class="category text-gray">ยินดีต้อนรับ</h6>
         								<h4 class="card-title"><?= Yii::$app->user->identity->username ?></h4>

                         <div class="pull-left">
                           <?= Html::a(
                               'ผู้ใช้งาน',
                               ['/user/index'],
                               ['data-method' => 'post', 'class' => 'btn btn-primary btn-round','style'=>'padding: 12px 25px;']
                           ) ?>
                         </div>
                         <div class="pull-right">
                             <?= Html::a(
                                 'ออกจากระบบ',
                                 ['/site/logout'],
                                 ['data-method' => 'post', 'class' => 'btn btn-primary btn-round','style'=>'padding: 12px 25px;']
                             ) ?>
                         </div>
     							   </div>
                        <!-- $menuItems[] = [
                            'label' => Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ]; -->
                    <?php
                  } //else
                    ?>


    						  </div>
                </li>



            </ul>
        </li>

      </ul>

<!--      <form class="navbar-form navbar-right" role="search">-->
<!--        <div class="form-group  is-empty">-->
<!--          <input type="text" class="form-control" placeholder="Search">-->
<!--          <span class="material-input"></span>-->
<!--        </div>-->
<!--        <button type="submit" class="btn btn-white btn-round btn-just-icon">-->
<!--          <i class="material-icons">search</i><div class="ripple-container"></div>-->
<!--        </button>-->
<!--      </form>-->
    </div>
  </div>
</nav>

<?php

/* @var $this yii\web\View */
$this->title = Yii::t('app', Yii::$app->name);
?>
<div class="site-index">

    <!--    <div class="jumbotron">-->
    <!--        <h1>Congratulations!</h1>-->
    <!---->
    <!--        <p class="lead">You have successfully installed Yii2 improved application template</p>-->
    <!---->
    <!--        <p><a class="btn btn-lg btn-success" href="http://www.freetuts.org/tutorial/view?id=6">Read our tutorial</a></p>-->
    <!--    </div>-->

    <div class="body-content">

        <div class="row">
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
            <!-- Tab panes -->
            <div class="tab-content gallery">
                <div class="tab-pane active" id="room" role="tabpanel">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="row collections">

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="landing-title" style="    margin-top: 40px; margin-bottom: 30px;">
                        <span class="title"
                              style="float: left;font-size: 26px;font-weight: 200;margin: 7px 0;color: #555;">
                            <i class="fas fa-bed"></i> ห้องเดี่ยว</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="จองห้องพัก">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="/product/paper-dashboard-2-pro">
                                            <h3>ห้องเดี่ยว
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>ห้องเดี่ยว เหมาะสำหรับนอนคนเดียว </p>
                                        </a>
                                        <span class="badge badge-primary">ไม่ว่าง</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="จองห้องพัก">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="/product/paper-dashboard-2-pro">
                                            <h3>ห้องเดี่ยว
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>ห้องเดี่ยว เหมาะสำหรับนอนคนเดียว </p>
                                        </a>
                                        <span class="badge badge-primary">ไม่ว่าง</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="จองห้องพัก">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="/product/paper-dashboard-2-pro">
                                            <h3>ห้องเดี่ยว
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>ห้องเดี่ยว เหมาะสำหรับนอนคนเดียว </p>
                                        </a>
                                        <span class="badge badge-primary">ไม่ว่าง</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="จองห้องพัก">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="/product/paper-dashboard-2-pro">
                                            <h3>ห้องเดี่ยว
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>ห้องเดี่ยว เหมาะสำหรับนอนคนเดียว </p>
                                        </a>
                                        <span class="badge badge-primary">ไม่ว่าง</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="จองห้องพัก">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="/product/paper-dashboard-2-pro">
                                            <h3>ห้องเดี่ยว
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>ห้องเดี่ยว เหมาะสำหรับนอนคนเดียว </p>
                                        </a>
                                        <span class="badge badge-primary">ไม่ว่าง</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg6.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="จองห้องพัก">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="/product/paper-dashboard-2-pro">
                                            <h3>ห้องเดี่ยว
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>ห้องเดี่ยว เหมาะสำหรับนอนคนเดียว </p>
                                        </a>
                                        <span class="badge badge-primary">ไม่ว่าง</span>
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="food" role="tabpanel">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="row collections">
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="landing-title" style="    margin-top: 40px; margin-bottom: 30px;">
                        <span class="title"
                              style="float: left;font-size: 26px;font-weight: 200;margin: 7px 0;color: #555;">
                            <i class="fas fa-utensils"></i> รายการอาหาร</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="สั่งอาหาร">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="#">
                                            <h3>ก้อย
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>อาหารอีสาน </p>
                                        </a>
                                    </div>
                                </div>

                            </div>
<div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="สั่งอาหาร">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="#">
                                            <h3>ก้อย
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>อาหารอีสาน </p>
                                        </a>
                                    </div>
                                </div>

                            </div>
<div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="สั่งอาหาร">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="#">
                                            <h3>ก้อย
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>อาหารอีสาน </p>
                                        </a>
                                    </div>
                                </div>

                            </div>
<div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="สั่งอาหาร">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="#">
                                            <h3>ก้อย
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>อาหารอีสาน </p>
                                        </a>
                                    </div>
                                </div>

                            </div>
<div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="สั่งอาหาร">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="#">
                                            <h3>ก้อย
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>อาหารอีสาน </p>
                                        </a>
                                    </div>
                                </div>

                            </div>
<div class="col-xs-12 col-sm-6  col-md-4 col-lg-4 ">
                                <div class="card" data-turbolinks="false">
                                    <div class="thumbnail">
                                        <img src="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             data-retina="<?= Yii::getAlias('@UploadsImg') . '/bg5.jpg' ?>"
                                             alt="No Image">

                                        <a href="#" class="thumb-cover"></a>

                                        <!--                        <div class="details">-->
                                        <!--                            <span class="badge badge-primary">ไม่ว่าง</span>-->
                                        <!--                            <div class="numbers">-->
                                        <!---->
                                        <!--                                <b class="downloads"><i class="fa fa-arrow-circle-o-down"></i> 35</b>-->
                                        <!--                                <b class="comments-icon"><i class="fa fa-comment"></i> 12</b>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="clearfix"></div>-->
                                        <!--                        </div>-->

                                        <b class="actions">
                                            <a href="#" class="btn btn-neutral btn-round btn-fill" rel="tooltip"
                                               title=""
                                               data-original-title="รายละเอียด">
                                                <i class="fa fa-align-left"></i>
                                            </a>

                                            <!--                            <a href="https://demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html" class="btn btn-neutral btn-fill btn-round" target="_blank" title="" rel="tooltip" data-original-title="Live Preview">-->
                                            <!--                                <i class="fa fa-laptop"></i>-->
                                            <!--                            </a>-->
                                            <a class="btn btn-info btn-round btn-fill" rel="tooltip" title=""
                                               data-remote="true"
                                               href="#" data-original-title="สั่งอาหาร">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a> </b>

                                    </div>
                                    <div class="card-info">

                                        <a href="#">
                                            <h3>ก้อย
                                                <div class="time pull-right  premium-product ">฿39</div>
                                            </h3>

                                            <p>อาหารอีสาน </p>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>


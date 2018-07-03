<?php

/* @var $this yii\web\View */
$this->title = 'I-Resort';

$this->registerCss("
h1{display:none;}
.btext{
    color: #f9f3f4;
    position: absolute;
    text-align: center;
    padding:0px 12px 0px 12px;
    top: 40%;
    width: 100%;
    line-height: 0.4em;
}

h1{
    font-size: 50px;
}

#btnlogo{
    color: #fff;
    text-decoration: none;
    border: #ccc 1px solid;
    padding: 15px 24px 3px 24px;
    border-radius: 8px;
    line-height: 4em;
}

#btnlogo:hover{
    color: #b19295;
    border: #fff 1px solid;
}
.main-footer{background:unset;border-top:unset;}
.content-wrapper{background-color:unset}
.content-header{ padding:unset;} 
.content{padding:unset; margin:unset;}");

?>
<div class="site-index">


    <!--    <div class="jumbotron">-->
    <!--        <h1>Congratulations!</h1>-->
    <!---->
    <!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
    <!---->
    <!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    <!--    </div>-->

    <div class="body-content">


        <div id="particles-js" style="height: 123vh; background-color: currentColor; ">
            <!--            <p align="center" style="    position: absolute;-->
            <!--    align-items: center;-->
            <!--    font-weight: 900;-->
            <!--    color: aliceblue;-->
            <!--    text-align: center;-->
            <!--    margin-top: 222px;-->
            <!--    font-size: -webkit-xxx-large;">ระบบการพยากรณ์จำนวนผู้ป่วย<br/>ด้วยโรคมะเร็งและเนื้องอก<br/>ในประเทศไทยออนไลน์</p>-->
            <div class="btext">
                <h2 style="font-size: xx-large;">I-Resort</h2>
                <!--                <h3>ในประเทศไทย</h3>-->
                <a href="#" class="btn" id="btnlogo"><i class="fa fa-bed" style="font-size: -webkit-xxx-large;"></i> </a>
            </div>
        </div>


    </div>
    <!--    <script>-->
    <!--        particlesJS.load('particles-js', 'C:\xampp\\htdocs\\forecasting03\\backend\\themes\\adminlte\\js\\particles.json', function() {-->
    <!--            console.log('callback - particles.js config loaded');-->
    <!--        });-->
    <!--    </script>-->
</div>


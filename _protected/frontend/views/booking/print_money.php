<?php

use yii\db\Query;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<span class="room-view">
    <table>
        <tr>
            <td>
                <?= Html::img(Yii::getAlias('@HeaderIcon'), ['width' => 100]) ?>
            </td>
            <td>
                <h4>I-Resort</h4>
                <strong>
                    <span>มหาวิทยาลัยราชภัฎ</span><br>
                    <span>อุดรธานี</span>
                </strong>
                <br>
                <small>Email: systemudon@gmail.com Tel : 0123456789</small>
            </td>
        </tr>
    </table>
    <h3 style="margin-left: 40%;">ใบเสร็จ</h3>

    <?php
    $fname = '-';
    $lname = '-';
    if ($user->Ufname){
        $fname = $user->Ufname;
    }
    if ($user->Ulname){
        $lname = $user->Ulname;
    }
    ?>
    <span>ผู้เข้าพัก: <?php echo($fname .'  '. $lname) ?></span>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th class="text-center">ห้อง</th>
            <th class="text-center">วันที่เข้าพัก</th>
            <th class="text-center">วันที่ออก</th>
            <th class="text-center">จำนวนวัน</th>
            <th class="text-center">ราคา</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= print_r($model->Rid,true)?></td>
            <td><?= print_r($model->Bdatein,true)?></td>
            <td><?= print_r($model->Bdateout,true)?></td>
            <td><?= print_r($model->Bnday,true)?></td>
            <td><?= print_r($model->Btotal,true)?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?= print_r($model->Btotal,true)?></td>
        </tr>

        </tbody>
    </table>

    <span>ยอดสุทธิ = ฿<?= print_r($model->Btotal,true)?></span>



    <p>------------------- i-Resort ขอบคุณค่ะ -------------------</p>

</div>

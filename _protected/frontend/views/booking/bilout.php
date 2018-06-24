<?php

use yii\db\Query;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



?>
<div class="room-view">
    <table>
        <tr>
            <td>
                <?=Html::img(Yii::getAlias('@HeaderIcon'), ['width' => 120])?>
            </td>
            <td>
                <h4>I-Resort</h4>
                <strong><i> มหาวิทยาลัยราชภัฎอุดรธานี</i></strong><br />
                <small>Email : systemudon@gmail.com Tel : 0123456789</small>
                <h3>ใบเสร็จ</h3>
            </td>
        </tr>
    </table>


    <br>
<?php
foreach ($dataProvider->models as $model){

    $sql2 = new  Query();
    $sql2->select('*')->from('payment')
        ->where(['PMid' => $model['PMid']]);
    $co = $sql2->createCommand();
    $d = $co->queryAll();

    $sql3 = new  Query();
    $sql3->select('*')->from('room')
        ->where(['Rid' => $model['Rid']]);
    $c3 = $sql3->createCommand();
    $d3 = $c3->queryAll();

foreach ($d as $dd) {
    foreach ($d3 as $dd3) {

        ?>
        <p>วันที่จอง : <?=
            $model->Bdate;
            ?></p>
        <p>ห้อง : <?=
            $dd3['Rname']
            ?>  </p>
        <p>ห้องที่ : <?=
            $dd3['Rnumber']
            ?>  </p>
        <p>จำนวน : <?=
            $model->Bnday;
            ?> วัน </p>
        <p>เช็คอิน : <?=
            $model->Bdatein;
            ?> เช็คเอ้า : <?=
            $model->Bdateout;
            ?></p>
        <p>การชำระเงิน : <?=
            $dd['PMname']
            ?></p>
        <p>ราคาสุทธิ : <?=
            $model->Btotal;
            ?> บาท</p>
        <?php
    }
}
}
?>
    <p>-----------------I Resort Welcome-----------------</p>

</div class="room-view">

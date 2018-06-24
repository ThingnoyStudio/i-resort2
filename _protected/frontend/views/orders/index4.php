<?php

use yii\db\Query;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
    <table>
        <tr>
            <td>
                <?=Html::img(Yii::getAlias('@HeaderIcon'), ['width' => 120])?>
            </td>
            <td>
                <h4>I-Resort</h4>
                <strong><i> มหาวิทยาลัยราชภัฎอุดระานี</i></strong><br />
                <small>Email : systemudon@gmail.com Tel : 0123456789</small>
                <h3>รายงานการสั่งซื้ออาหาร</h3>
            </td>
        </tr>
    </table>

    <table class="table_bordered" width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
            <td>
                วันที่สั่งซื้อ
            </td>
            <td>
                ราคารวม
            </td>
            <td>
                การชำระเงิน
            </td>
            <td>
                เมนูอาหาร
            </td>
        </tr>


        <?php
        foreach ($dataProvider->models as $model){


            $sql2 = new  Query();
            $sql2->select('PMname')->from('payment')
                ->where(['PMid' => $model['Pid']]);
            $co = $sql2->createCommand();
            $d = $co->queryAll();
            foreach ($d as $dd) {
                $f = null;
                ?>
                <tr>
                    <td> <?= $model['Odate'] ?></td>
                    <td> <?= $model['Optotal'] ?></td>
                    <td> <?= $dd['PMname'] ?></td>
                    <td>
                        <?php
                        $sql = new Query();
                        $sql->select('*')->from('orderdetail')
                            ->join('INNER JOIN','food','orderdetail.Fid = food.Fid ')
                            ->where('orderdetail.Oid = '.$model['Oid']);
                        $com = $sql->createCommand();
                        $data = $com->queryAll();
                        foreach ($data as $item) {
                            $f = $item['Fname']." ราคา ".$item['Fprice']." บาท";
                            echo $f;
                            ?>
                            <br>
                            <?php
                        }
                        ?>
                    </td>
                </tr>

                <?php
            }
        }
        ?>
    </table>

</div>


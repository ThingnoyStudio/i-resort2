<?php
/**
 * Created by PhpStorm.
 * User: HBO
 * Date: 3/7/2561
 * Time: 16:43
 */
?>
<!--<div class="room-index">-->
<!--    <div class="row">-->

<div class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>จองห้องพัก หมายเลข<?= ' ' . $model['Rnumber'] ?></h3>
            </div>
            <div class="modal-body">
                <div class="thumbnail" style="display: flex; max-height: 158.91px">
                    <img src="<?= Yii::getAlias('@ShowR') . $model['Rimg'] ?>" style="height: fit-content;">
                </div>
                <div class="card-info">
                    <h4>
                        <span style="margin-right: 4px">หมายเลขห้อง: <?= $model['Rnumber'] ?></span>
                        ชื่อห้อง: <?= $model['Rname'] ?>
                        <div class="time pull-right">
                            ราคา:
                            <span class="line-through "
                                  style="text-decoration: line-through;color: #777777;">฿<?= $model['Rprice'] ?></span>
                            <span class="line-through "
                                  style="color: #FF281E;">฿<?= ($model['Rprice'] - $p) ?></span>
                        </div>
                    </h4>
                    <span>รายละเอียด: <?= $model['Rdes'] ?></span><br>
                    <span>สถานะห้องพัก: <?= $roomStatus ?></span><br>
                    <span>ประเภทห้องพัก: </i><?= $roomType ?></span><br>
                    <span>ช่วงวันที่เข้าพัก: <?= $daterange ?></span><br>
                    <span>จำนวนวันเข้าพัก: <?= $days . ' วัน' ?></span>
                </div>
                <div style="display: flex; font-size: x-large;">
                    <span>ยอดรวมสุทธิ: </span>
                    <span style=" text-align: right; color: #FF281E;font-weight: 500;">฿<?= $total ?></span>

                </div>
            </div>
            <div class="modsl-footer">
                <hr>
                <img src="<?= Yii::getAlias('@UploadsImg') . '/bbl.png' ?>" style="height: 23px; width: 23px; margin-top: 3px;"><span> ธ.กรุงเทพ: 933-3-39333-3</span><br>
                <img src="<?= Yii::getAlias('@UploadsImg') . '/kbank.png' ?>" style="height: 23px; width: 23px; margin-top: 3px;"><span> ธ.กสิกรไทย: 933-3-39333-3</span><br>
                <img src="<?= Yii::getAlias('@UploadsImg') . '/krungsri.png' ?>" style="height: 23px; width: 23px; margin-top: 3px;"><span> ธ.กรุงศรีอยุธยา: 933-3-39333-3</span>

            </div>
        </div>
    </div>
</div>
<!--    </div>-->
<!--</div>-->




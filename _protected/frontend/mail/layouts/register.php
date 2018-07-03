
    <h1>การจองหเองพัก</h1>

    <p>เรียนคุณ <?php echo $fname; ?>___<?php echo $lname; ?></p>
    <p>คุณได้จองห้อง </p>


    <p>
        ใบเสร็จการชำระเงิน
    </p>

    <div class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>จองห้องพัก หมายเลข<?= ' ' . $Rnumber ?></h3>
                </div>
                <div class="modal-body">
                    <div class="thumbnail" style="display: flex; max-height: 158.91px">
                        <img src="<?= Yii::getAlias('@ShowR') . $Rimg ?>" style="height: fit-content;">
                    </div>
                    <div class="card-info">
                        <h4>
                            <span style="margin-right: 4px">หมายเลขห้อง: <?= $Rnumber?></span>
                            ชื่อห้อง: <?= $Rname ?>
                            <div class="time pull-right">
                                ราคา:
                                <span class="line-through "
                                      style="color: #FF281E;">฿<?= $total ?></span>
                            </div>
                        </h4>


                        <span>ช่วงวันที่เข้าพัก: <?= $in  ?> ถึง <?= $out ?></span><br>
                        <span>จำนวนวันเข้าพัก: <?= $numday . ' วัน' ?></span>
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


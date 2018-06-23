<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $Bid รหัส
 * @property string $Bdate วันที่จอง
 * @property string $Rid หมายเลขห้อง
 * @property string $Uid ผู้ใช้งาน
 * @property string $ADid ที่อยู่
 * @property string $Bnday จำนวนวัน
 * @property string $Bdatein วันที่เช็คอิน
 * @property string $Bdateout วันที่เช็คเอ้า
 * @property string $PMid การชำระเงิน
 * @property string $datebetween ช่วงเวลา
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Bdate', 'Rid', 'Uid', 'ADid', 'Bnday',  'PMid','datebetween'], 'string'],
            [['Bdatein', 'Bdateout'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Bid' => 'รหัส',
            'Bdate' => 'วันที่จอง',
            'Rid' => 'หมายเลขห้อง',
            'Uid' => 'ผู้ใช้งาน',
            'ADid' => 'ที่อยู่',
            'Bnday' => 'จำนวนวัน',
            'Bdatein' => 'วันที่เช็คอิน',
            'Bdateout' => 'วันที่เช็คเอ้า',
            'PMid' => 'การชำระเงิน',
            'datebetween' => 'ช่วงเวลา'
        ];
    }
}

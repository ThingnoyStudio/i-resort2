<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

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
* @property string $Btotal ราคาสุทธิ
 * @property string $Bbil ใบเสร็จ
 * @property string $month เดือน
 * @property string $year ปี


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
            [['Bdate', 'Rid', 'Uid', 'ADid', 'Bnday',  'PMid','datebetween','Btotal','month','year'], 'string'],
            [
                ['Bbil'],'file',
                'skipOnEmpty' => true,
                'extensions' => 'jpg,png'
            ],
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
            'Rid' => 'เลขห้อง',
            'Uid' => 'ผู้ใช้งาน',
            'ADid' => 'ที่อยู่',
            'Bnday' => 'จำนวนวัน',
            'Bdatein' => 'วันที่เช็คอิน',
            'Bdateout' => 'วันที่เช็คเอ้า',
            'PMid' => 'การชำระเงิน',
            'Btotal' => 'ราคาสุทธิ',

            'datebetween' => 'ช่วงเวลา',
            'room.Rname' => 'ชื่อห้อง',
            'Bbil'=>'ใบเสร็จชำระเงิน',
            'month'=>'เดือน',
            'year'=>'ปี',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['Rid' => 'Rid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['Uid' => 'Uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payment::className(), ['PMid' => 'PMid']);
    }

    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        $path = Yii::getAlias('@Uploadsbil');
        if ($this->validate() && $photo !== null) {

            // $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
            $fileName = $photo->baseName . '.' . $photo->extension;
            if($photo->saveAs($path.'/'.$fileName)){
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }


    public function getYearsList() {
        $currentYear = date('Y')+5;
        $yearFrom = 1995;
        $yearsRange = range($yearFrom, $currentYear);
        return array_combine($yearsRange, $yearsRange);
    }
}

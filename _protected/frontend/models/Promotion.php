<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "promotion".
 *
 * @property int $Pid รหัส
 * @property string $Pname ชื่อโปรโมชั่น
 * @property string $Pdatestart วันที่เริ่ม
 * @property string $Pdateend วันที่สิ้นสุด
 * @property string $Pdistant ส่วนลด
 * @property string $Pimg รูปภาพ
 * @property string $kvdate1 ช่วงวันที่
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Pname', 'Pdatestart', 'Pdateend', 'Pdistant', 'Pimg','kvdate1'], 'string'],
            [['Pname', 'Pdatestart', 'Pdateend', 'Pdistant', 'kvdate1'], 'required'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Pid' => 'รหัส',
            'Pname' => 'ชื่อโปรโมชั่น',
            'Pdatestart' => 'วันที่เริ่ม',
            'Pdateend' => 'วันที่สิ้นสุด',
            'Pdistant' => 'ส่วนลด(%)',
            'Pimg' => 'รูปภาพ',
            'kvdate1' => 'ช่วงวันที่',
        ];
    }

    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        //$path = 'C:/xampp/htdocs/udondeliveryu3/uploads/images/Restaurantimg/';
        $path = Yii::getAlias('@UploadPromotion');
        if ($this->validate() && $photo !== null) {

            // $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
            $fileName = $photo->baseName . '.' . $photo->extension;
            if($photo->saveAs($path.'/'.$fileName)){
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }
}

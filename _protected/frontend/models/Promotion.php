<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "promotion".
 *
 * @property int $Pid รหัส
 * @property string $Pname ชื่อโปรโมชั่น
 * @property string $Pdatestart วันที่เริ่ม
 * @property string $Pdateend วันที่สิ้นสุด
 * @property string $Pdistant ส่วนลด
 * @property string $Ping รูปภาพ
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
            [['Pname', 'Pdatestart', 'Pdateend', 'Pdistant', 'Ping'], 'string'],
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
            'Pdistant' => 'ส่วนลด',
            'Ping' => 'รูปภาพ',
        ];
    }
}

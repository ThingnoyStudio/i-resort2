<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $ADid รหัส
 * @property string $ADnumber บ้านเลขที่
 * @property string $ADhome หมู่บ้าน
 * @property string $ADsubdistrict ตำบล
 * @property string $ADdistrict อำเภอ
 * @property string $ADprovince จังหวัด
 * @property string $ADzipcode รหัสไปรษณี
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ADnumber', 'ADhome', 'ADsubdistrict', 'ADdistrict', 'ADprovince', 'ADzipcode'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ADid' => 'รหัส',
            'ADnumber' => 'บ้านเลขที่',
            'ADhome' => 'หมู่บ้าน',
            'ADsubdistrict' => 'ตำบล',
            'ADdistrict' => 'อำเภอ',
            'ADprovince' => 'จังหวัด',
            'ADzipcode' => 'รหัสไปรษณี',
        ];
    }
}

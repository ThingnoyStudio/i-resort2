<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $Uid
 * @property string $Ufname ชื่อ
 * @property string $Ulname นามสกุล
 * @property string $Uemail อีเมล์
 * @property string $Uphone เบอร์โทร
 * @property string $Uimg รูปภาพ
 * @property int $ADid รหัสที่อยู่
 * @property int $USid สถานะผู้ใช้งาน
 * @property int $iduser
 *
 * @property Userstatus $uS
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Ufname', 'Ulname', 'Uemail', 'Uphone', 'Uimg'], 'string'],
            [['ADid', 'USid', 'iduser'], 'integer'],
            [['USid'], 'exist', 'skipOnError' => true, 'targetClass' => Userstatus::className(), 'targetAttribute' => ['USid' => 'USid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Uid' => 'Uid',
            'Ufname' => 'ชื่อ',
            'Ulname' => 'นามสกุล',
            'Uemail' => 'อีเมล์',
            'Uphone' => 'เบอร์โทร',
            'Uimg' => 'รูปภาพ',
            'ADid' => 'รหัสที่อยู่',
            'USid' => 'สถานะผู้ใช้งาน',
            'iduser' => 'Iduser',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUS()
    {
        return $this->hasOne(Userstatus::className(), ['USid' => 'USid']);
    }
}

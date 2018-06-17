<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $Rid รหัส
 * @property string $Rname ชื่อห้อง
 * @property string $Rnumber หมายเลขห้อง
 * @property string $Rdes รายละเอียด
 * @property string $Rimg รูปภาพ
 * @property int $RSid รหัสสถานะห้อง
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Rname', 'Rnumber', 'Rdes', 'Rimg'], 'string'],
            [['RSid'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Rid' => 'รหัส',
            'Rname' => 'ชื่อห้อง',
            'Rnumber' => 'หมายเลขห้อง',
            'Rdes' => 'รายละเอียด',
            'Rimg' => 'รูปภาพ',
            'RSid' => 'รหัสสถานะห้อง',
        ];
    }
}

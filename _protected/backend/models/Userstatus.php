<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "userstatus".
 *
 * @property int $USid รหัส
 * @property string $USname ชื่อสถานะผู้ใช้งาน
 */
class Userstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USname'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'USid' => 'รหัส',
            'USname' => 'ชื่อสถานะผู้ใช้งาน',
        ];
    }
}

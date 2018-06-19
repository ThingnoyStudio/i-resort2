<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "roomstatus".
 *
 * @property int $RSid รหัส
 * @property string $RSname สถานะห้อง
 */
class Roomstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roomstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RSname'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'RSid' => 'รหัส',
            'RSname' => 'สถานะห้อง',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $Oid รหัส
 * @property string $Odate วันที่
 * @property string $Optotal ราคารวม
 * @property int $Pid การชำระเงิน
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Odate', 'Optotal'], 'string'],
            [['Pid'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Oid' => 'รหัส',
            'Odate' => 'วันที่',
            'Optotal' => 'ราคารวม',
            'Pid' => 'การชำระเงิน',
        ];
    }
}

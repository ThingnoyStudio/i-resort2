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
 * @property int $Bid ห้องที่
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
            [['Odate', 'Optotal','Bid'], 'string'],
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
            'Bid' => 'ห้องที่สั่ง',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetail()
    {
        return $this->hasOne(Orderdetail::className(), ['Oid' => 'Oid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payment::className(), ['PMid' => 'Pid']);
    }



}

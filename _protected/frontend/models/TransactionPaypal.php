<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transaction_paypal".
 *
 * @property int $id ไอดี
 * @property int $user_id รหัสลูกค้า
 * @property string $payment_id รหัสการจ่าย
 * @property string $hash แฮช
 * @property int $complete สถานะ
 * @property string $create_time ทำรายการเมื่อ
 * @property string $update_time แก้ไขรายการเมื่อ
 * @property int $product_id รหัสสินค้า
 */
class TransactionPaypal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_paypal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'complete', 'product_id'], 'integer'],
            [['payment_id', 'hash'], 'string', 'max' => 100],
            [['create_time', 'update_time'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ไอดี',
            'user_id' => 'รหัสลูกค้า',
            'payment_id' => 'รหัสการจ่าย',
            'hash' => 'แฮช',
            'complete' => 'สถานะ',
            'create_time' => 'ทำรายการเมื่อ',
            'update_time' => 'แก้ไขรายการเมื่อ',
            'product_id' => 'รหัสสินค้า',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "orderdetail".
 *
 * @property int $ODid รหัส
 * @property int $Fid รหัสอาหาร
 * @property int $Oid รหัสออเดอร์
 */
class Orderdetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderdetail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fid', 'Oid'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ODid' => 'รหัส',
            'Fid' => 'รหัสอาหาร',
            'Oid' => 'รหัสออเดอร์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::className(), ['Fid' => 'Fid']);
    }
}

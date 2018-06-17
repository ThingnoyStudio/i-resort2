<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property int $Fid รหัส
 * @property string $Fname ชื่ออาหาร
 * @property string $Fprice ราคา
 * @property string $Fimg รูปภาพ
 */
class Food extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fname', 'Fprice', 'Fimg'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Fid' => 'รหัส',
            'Fname' => 'ชื่ออาหาร',
            'Fprice' => 'ราคา',
            'Fimg' => 'รูปภาพ',
        ];
    }
}

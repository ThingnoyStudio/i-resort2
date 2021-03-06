<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "roomtype".
 *
 * @property int $RTid รหัส
 * @property string $RTname ชื่อประเภทห้อง
 */
class Roomtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roomtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RTname'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'RTid' => 'รหัส',
            'RTname' => 'ชื่อประเภทห้อง',
        ];
    }

    public static function getRoomTypeName()
    {
        $model = Roomtype::find()->asArray()->all();
        return \yii\helpers\ArrayHelper::map($model, 'RTname', 'RTname');
    }
}

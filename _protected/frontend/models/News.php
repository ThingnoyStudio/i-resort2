<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $Nid รหัส
 * @property string $Ntopic หัวข้อ
 * @property string $Ndes รายละเอียด
 * @property string $Nimg รูปภาพ
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Ntopic', 'Ndes', 'Nimg'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Nid' => 'รหัส',
            'Ntopic' => 'หัวข้อ',
            'Ndes' => 'รายละเอียด',
            'Nimg' => 'รูปภาพ',
        ];
    }
}

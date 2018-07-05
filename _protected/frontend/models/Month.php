<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "month".
 *
 * @property int $Mid
 * @property string $Mname
 * @property string $Mnum
 */
class Month extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'month';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Mname','Mnum'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Mid' => 'Mid',
            'Mname' => 'Mname',
            'Mnum'=>'Mnum',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

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

    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        //$path = 'C:/xampp/htdocs/udondeliveryu3/uploads/images/Restaurantimg/';
        $path = Yii::getAlias('@UploadFood');
        if ($this->validate() && $photo !== null) {

            // $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
            $fileName = $photo->baseName . '.' . $photo->extension;
            if($photo->saveAs($path.'/'.$fileName)){
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }
}

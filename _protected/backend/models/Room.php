<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "room".
 *
 * @property int $Rid รหัส
 * @property string $Rname ชื่อห้อง
 * @property string $Rnumber หมายเลขห้อง
 * @property string $Rdes รายละเอียด
 * @property string $Rimg รูปภาพ
 * @property int $RSid รหัสสถานะห้อง
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Rname', 'Rnumber', 'Rdes', 'Rimg'], 'string'],
            [['RSid'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Rid' => 'รหัส',
            'Rname' => 'ชื่อห้อง',
            'Rnumber' => 'หมายเลขห้อง',
            'Rdes' => 'รายละเอียด',
            'Rimg' => 'รูปภาพ',
            'RSid' => 'รหัสสถานะห้อง',
        ];
    }

    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        //$path = 'C:/xampp/htdocs/udondeliveryu3/uploads/images/Restaurantimg/';
        $path = Yii::getAlias('@UploadRoom');
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

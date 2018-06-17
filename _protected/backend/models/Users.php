<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "users".
 *
 * @property int $Uid
 * @property string $Ufname ชื่อ
 * @property string $Ulname นามสกุล
 * @property string $Uemail อีเมล์
 * @property string $Uphone เบอร์โทร
 * @property string $Uimg รูปภาพ
 * @property int $ADid รหัสที่อยู่
 * @property int $USid สถานะผู้ใช้งาน
 * @property int $iduser
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Ufname', 'Ulname', 'Uemail', 'Uphone', 'Uimg'], 'string'],
            [['ADid', 'USid', 'iduser'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Uid' => 'Uid',
            'Ufname' => 'ชื่อ',
            'Ulname' => 'นามสกุล',
            'Uemail' => 'อีเมล์',
            'Uphone' => 'เบอร์โทร',
            'Uimg' => 'รูปภาพ',
            'ADid' => 'รหัสที่อยู่',
            'USid' => 'สถานะผู้ใช้งาน',
            'iduser' => 'Iduser',
        ];
    }

    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
        //$path = 'C:/xampp/htdocs/udondeliveryu3/uploads/images/Restaurantimg/';
        $path = Yii::getAlias('@UploadUser');
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

<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
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
            [['Rname', 'Rnumber', 'Rdes', 'Rimg','Rprice'], 'string'],
            [['RSid','RTid'], 'integer'],
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
            'Rprice' => 'ราคา',
            'Rimg' => 'รูปภาพ',
            'RSid' => 'รหัสสถานะห้อง',
            'RTid' => 'รหัสสถานะห้อง',
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomstatus()
    {
        return $this->hasOne(Roomstatus::className(), ['RSid' => 'RSid']);
    }

    public function getAll()
    {
        $get = Room::find()->all();
        $result = ArrayHelper::map($get, 'Rid', 'Rid');
        return $result;
    }

}

<?php
namespace frontend\models;

    use Yii;
    use yii\base\Model;
    // use app\models\Login;
    use common\models\User;




    class PasswordForm extends Model{
        public $oldpass;
        public $newpass;
        public $repeatnewpass;

        public function rules(){
            return [
                [['oldpass','newpass','repeatnewpass'],'required'],
                ['oldpass','findPasswords'],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }

        public function findPasswords($attribute, $params){
            $user = User::find()->where([
                'username'=>Yii::$app->user->identity->username
            ])->one();
            // $password = $user->password;
            // if($password!=$this->oldpass){
            //     $this->addError($attribute,'Old password is incorrect');
            // }
            if (!$this->hasErrors())
            {
                // $user = $this->getUser();

                if (!$user || !$user->validatePassword($this->oldpass))
                {
                  $this->addError($attribute,'Old password is incorrect');
                    // if scenario is 'lwe' we use email, otherwise we use username
                    // $field = ($this->scenario === 'lwe') ? 'email' : 'username' ;
                    //
                    // $this->addError($attribute, 'Incorrect '.$field.' or password.');
                }
            }
        }

        public function attributeLabels(){
            return [
                'oldpass'=>'รหัสผ่านเก่า',
                'newpass'=>'รหัสผ่านใหม่',
                'repeatnewpass'=>'ยืนยันรหัสผ่าน',
            ];
        }
    }

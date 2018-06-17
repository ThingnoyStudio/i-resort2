# resort
i-resort management

## How to Run Project
 1. run composer update 
    - cd to **root project** and write command ``` composer update ```
 2. run php init
    - cd to **_protected** and write command ``` php init ```

 3. coppy setting to config
    - coppy below code to **_protected/common/config/param-local**
 ``` php 
 <?php
Yii::setAlias('@uploadUrl','/uploads/');//for show
Yii::setAlias('@ShowUde','@appRoot3/uploads/logo1.png'); //โชว์ user แบบ pยังไม่ได้login
Yii::setAlias('@ShowPhotoAdmin','@appRoot3/uploads/img/man.png');

Yii::setAlias('@UploadUser','@appRoot2/uploads/images/users/'); //อัพ user
Yii::setAlias('@ShowU','@appRoot3/uploads/images/users/');//โชว์ user

Yii::setAlias('@UploadRoom','@appRoot2/uploads/images/room/');//อัพ oom
Yii::setAlias('@ShowR','@appRoot3/uploads/images/room/');//โชว์ room


Yii::setAlias('@UploadNews','@appRoot2/uploads/images/news/'); // อัพ news
Yii::setAlias('@ShowN','@appRoot3/uploads/images/news/');//โชว์ news
return [
]; 
``` 


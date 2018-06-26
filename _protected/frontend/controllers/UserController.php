<?php
namespace frontend\controllers;

use common\models\User;
use common\models\UserSearch;
use common\rbac\models\Role;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['id'=>Yii::$app->user->identity->id]),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     *
     * @param  integer $id The user id.
     * @return string
     *
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $user = new User(['scenario' => 'create']);
        $role = new Role();

        if ($user->load(Yii::$app->request->post()) && 
            $role->load(Yii::$app->request->post()) &&
            Model::validateMultiple([$user, $role]))
        {
            $user->setPassword($user->password);
            $user->generateAuthKey();
            
            if ($user->save()) 
            {
                $role->user_id = $user->getId();
                $role->save(); 
            }  

            return $this->redirect('index');      
        } 
        else 
        {
            return $this->render('create', [
                'user' => $user,
                'role' => $role,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param  integer $id The user id.
     * @return string|\yii\web\Response
     *
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param  integer $id The user id.
     * @return \yii\web\Response
     *
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        // delete this user's role from auth_assignment table
        if ($role = Role::find()->where(['user_id'=>$id])->one()) 
        {
            $role->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param  integer $id The user id.
     * @return User The loaded model.
     *
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) 
        {
            return $model;
        } 
        else 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

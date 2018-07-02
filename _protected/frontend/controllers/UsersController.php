<?php

namespace frontend\controllers;

use frontend\models\Address;
use Yii;
use frontend\models\Users;
use frontend\models\UsersSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find()->where(['Uid' => Yii::$app->user->identity->id]),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
//        $searchModel = new UsersSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

    public function actionIndex2()
    {
        $searchModel = new UsersSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find()->where(['USid' => 1]),
        ]);
        return $this->render('index2', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
//        $searchModel = new UsersSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $address = $this->findAddressModel($id);
        if (!$address) {
            $address = new Address();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'model2' => $address,
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Uid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model2 = $this->findAddressModel($id);

//        return print("<pre>".print_r($model,true)."</pre>");
//return var_dump($model2);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->Uimg = $model->upload($model, 'Uimg');
            if ($model2 != null) {
                if ($model2->load(Yii::$app->request->post()) && $model2->validate()) {
                    try {
//                        return print("<pre>" . print_r($model2, true) . "</pre>");
//                        $model2->save();
                        if ($model2->save()) {
//                            $model->ADid = $model2->ADid;
                            $model->save();
                            return $this->redirect(['view', 'id' => $model->Uid]);
                        } else {
                            return print 'error1_In';
                        }
                    } catch (Exception $ex) {
                        return print 'error: ' . $ex->getMessage();
                    }

                } else {
                    return print 'error1_out';
                }
            } else {
                $model2 = new Address();
                if ($model2->load(Yii::$app->request->post()) && $model2->validate()) {
                    $model2->Uid = $id;
                    if ($model2->save()) {
                        $model->ADid = $model2->ADid;
                        $model->save();
                        return $this->redirect(['view', 'id' => $model->Uid]);
                    } else {
                        return print 'error2_In';
                    }
                } else {
                    return print 'error2_out';
                }
            }

        } else {
            if ($model2 == null) {
                $model2 = new Address();
            }
            return $this->render('update', [
                'model' => $model,
                'model2' => $model2,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     */
    protected function findAddressModel($id)
    {
        if (($model2 = Address::find()->where(['Uid' => $id])->one()) != null) {
            return ($model2);
        } else {
            return null;
        }
    }

}

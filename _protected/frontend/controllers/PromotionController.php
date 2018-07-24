<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Promotion;
use frontend\models\PromotionSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PromotionController implements the CRUD actions for Promotion model.
 */
class PromotionController extends Controller
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
     * Lists all Promotion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PromotionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex2()
    {
        $searchModel = new PromotionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex3()
    {
        $searchModel = new PromotionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Promotion model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function findDdate($sdate, $edate)
    {
        return $check_date = Yii::$app->db->createCommand('select * from promotion where \'' . $sdate . '\' between Pdatestart and Pdatestart or \'' . $edate . '\' between Pdateend and Pdateend')->queryAll();
    }

    /**
     * Creates a new Promotion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Promotion();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $range = $model->kvdate1;
            $model->Pdatestart = explode(' ', $range)[0];
            $model->Pdateend = explode(' ', $range)[2];;
            if ($this->findDdate($model->Pdatestart, $model->Pdateend) > 0) {
                Yii::$app->getSession()->setFlash('Oops', [
                    'body' => 'ช่วงเวลานี้ มีการกำหนดโปรโมชั่นแล้ว!',
                    'type' => 'warning',
                ]);
                return $this->redirect(['promotion/index3']);
            }

            $model->Pimg = $model->upload($model, 'Pimg');
            $model->save();
            return $this->redirect(['view', 'id' => $model->Pid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Promotion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $range = $model->kvdate1;
            $model->Pdatestart = explode(' ', $range)[0];
            $model->Pdateend = explode(' ', $range)[2];;
            if ($this->findDdate($model->Pdatestart, $model->Pdateend)) {
                Yii::$app->getSession()->setFlash('Oops', [
                    'body' => 'ช่วงเวลานี้ มีในโปรโมชั่นแล้ว: ',
                    'type' => 'warning',
//                        'options'=>['class'=>'alert-warning']
                ]);
                return $this->redirect(['promotion/index']);
            }

            $model->Pimg = $model->upload($model, 'Pimg');
            $model->save();
            return $this->redirect(['view', 'id' => $model->Pid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Promotion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDelete_money($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index3']);
    }

    /**
     * Finds the Promotion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Promotion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Promotion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

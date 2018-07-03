<?php

namespace frontend\controllers;

use frontend\models\Room;
use frontend\models\RoomSearch;
use kartik\mpdf\Pdf;
use Yii;
use frontend\models\Booking;
use frontend\models\BookingSearch;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
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
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReportbooking()
    {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('reportbooking', [
//            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMpdfdemo1()
    {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $content = $this->renderPartial('reportbooking2', [
//            'model' => $model,
//            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            // etc...
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $content,
            'filename' => 'your_filename.pdf',
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'format' => Pdf::FORMAT_A4,
//            'format' => [100, 236],
            'cssFile' => '@frontend/pdf.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => [
                'title' => 'Factuur',

            ],
            'methods' => [

            ]
        ]);

        return $pdf->render();
    }

    public function actionMpdfdemo2()
    {
        $NewDate = Date('Y-m-d', strtotime("+1 days"));



        $searchModel = new BookingSearch();

        $query = Booking::find()->where(['Bdatein'=>$NewDate])
        ;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $content = $this->renderPartial('index6', [
//            'model' => $model,
//            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            // etc...
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $content,
            'filename' => 'your_filename.pdf',
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'format' => Pdf::FORMAT_A4,
//            'format' => [100, 236],
            'cssFile' => '@frontend/pdf.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => [
                'title' => 'Factuur',

            ],
            'methods' => [

            ]
        ]);

        return $pdf->render();
    }

    public function actionMpdfdemo3()
    {
        $dateNow = date('Y-m-d');
        $searchModel = new BookingSearch();

        $query = Booking::find()->where(['Bdatein'=>$dateNow])
        ;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $content = $this->renderPartial('index7', [
//            'model' => $model,
//            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            // etc...
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $content,
            'filename' => 'your_filename.pdf',
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'format' => Pdf::FORMAT_A4,
//            'format' => [100, 236],
            'cssFile' => '@frontend/pdf.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => [
                'title' => 'Factuur',

            ],
            'methods' => [

            ]
        ]);

        return $pdf->render();
    }



    public function actionIndex2()
    {
        $searchModel = new BookingSearch();

        $dataProvider = Booking::find()->where('Uid = '.Yii::$app->request->queryParams)
        ;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex3()
    {
        $searchModel = new BookingSearch();

        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);


        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex5()
    {
        $searchModel = new BookingSearch();

        $query = Booking::find()->where('PMid != 3 ')
        ;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $this->render('index5', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex6()
    {
//        $dateNow = date('Y-m-d');
        $NewDate = Date('Y-m-d', strtotime("+1 days"));



        $searchModel = new BookingSearch();

        $query = Booking::find()->where(['Bdatein'=>$NewDate])
        ;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $this->render('index6', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex7()
    {

        $dateNow = date('Y-m-d');
        $searchModel = new BookingSearch();

        $query = Booking::find()->where(['Bdatein'=>$dateNow])
        ;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $this->render('index7', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex4()
    {
        $searchModel = new BookingSearch();
        $uid = Yii::$app->user->getId();
        $dataProvider = $searchModel->search3($uid);

        return $this->render('index4', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChbooking()
    {
        $searchModel = new BookingSearch();
        $query = Booking::find()->where(['PMid'=> 3 ])
        ;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('chbooking', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Booking model.
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
    public function actionView3($id)
    {
        return $this->render('view3', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionsUpdatebil($id)
    {
        $model = $this->findModel($id);
        $model->PMid = "4";
        $model->save();
        return $this->redirect(['chbooking']);

    }

    public function actionUpdatestatus($id,$id2)
    {
        $model = $this->findModel2($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->Rimg = $model->upload($model,'Rimg');
            $model->save();

            $searchModel = new BookingSearch();
            $dataProvider = $searchModel->search($id2);

            $content = $this->renderPartial('bilout', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'content' => $content,
                'filename' => 'your_filename.pdf',
                'orientation' => Pdf::ORIENT_PORTRAIT,
                'destination' => Pdf::DEST_BROWSER,
//                'format' => Pdf::FORMAT_A4,
            'format' => [100, 236],
                'cssFile' => '@frontend/pdf.css',
                'cssInline' => '.kv-heading-1{font-size:18px}',
                'options' => [
                    'title' => 'Factuur',

                ],
                'methods' => [

                ]
            ]);

            return $pdf->render();

//            return $this->redirect(['bilout']);
        }

        return $this->render('updatestatus', [
            'model' => $model,
        ]);
    }

    public function actionView2($id)
    {
        $model = Booking::findOne($id);
        $searchModel = new RoomSearch();

        $o = $model->Rid;
        $dataProvider = $searchModel->search2($o);

        return $this->render('view2', [
            'model' => $this->findModel($id),
            'model2' => $this->findModel2($o),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Booking();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->Bbil = $model->upload2($model,'Bbil');
            $model->save();
            return $this->redirect(['view', 'id' => $model->Bid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->Bbil = $model->upload2($model,'Bbil');
            $model->save();
            return $this->redirect(['view', 'id' => $model->Bid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionUpload2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->Bbil = $model->upload($model, 'Bbil');
//            $model->PMid = "4";
            $model->save();
            return $this->redirect(['index4']);
        }

        return $this->redirect(['view3', 'id' => $model->Bid]);
    }
    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Bid]);
        }

        return $this->render('update2', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Booking model.
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

    public function actionDelete2($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index4']);
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModel2($id)
    {
        if (($model2 = Room::findOne($id)) !== null) {
            return $model2;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModel3($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}

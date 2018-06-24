<?php

namespace frontend\controllers;

use frontend\models\Room;
use frontend\models\RoomSearch;
use kartik\mpdf\Pdf;
use Yii;
use frontend\models\Booking;
use frontend\models\BookingSearch;
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

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index2', [
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
    public function actionUpdatestatus($id,$id2)
    {
        $model = $this->findModel2($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->Rimg = $model->upload($model,'Rimg');
            $model->save();

//            $searchModel = new BookingSearch();
//            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $content = $this->renderPartial('bilout', [
                'model' => $this->findModel3($id2),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Bid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
        $model2 = Booking::find()
            ->join('INNER JOIN','room','room.Rid = booking.Rid')
            ->where('booking.Bid ='.$id)->all();
            return $model2;
    }
}

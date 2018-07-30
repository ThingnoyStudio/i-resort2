<?php

namespace frontend\controllers;

use frontend\models\Address;
use frontend\models\Room;
use frontend\models\RoomSearch;
use frontend\models\Users;
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

    public function actionReportbooking($type = null)
    {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($type == 'pdf') {
            return $this->Mpdfdemo1($searchModel, $dataProvider);

        } else {
            return $this->render('reportbooking', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    private function Mpdfdemo1($searchModel, $dataProvider)
    {
//        $searchModel = new BookingSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $content = $this->renderPartial('reportpdf', [
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

        $query = Booking::find()->where(['Bdatein' => $NewDate]);
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

        $query = Booking::find()->where(['Bdatein' => $dateNow]);
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

        $dataProvider = Booking::find()->where('Uid = ' . Yii::$app->request->queryParams);

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
        $dataProvider = $searchModel->search_counter(Yii::$app->request->queryParams);
//        $query = Booking::find()->where('PMid != 3 ');
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//        ]);


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

        $query = Booking::find()->where(['Bdatein' => $NewDate]);
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

        $query = Booking::find()->where(['Bdatein' => $dateNow]);
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
        $query = Booking::find()->where(['PMid' => 6]);// รอการยืนยัน
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['Bid'=>SORT_DESC]],
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

    public function actionView_counter($id)
    {
        $booking = $this->findModel($id);
        $user = $this->findUsersModel($booking->Uid);
        $address = null;
        if ($user->ADid) {
            $address = $this->findAddressById($user->ADid);
        }
        if (!$address) {
            $address = new Address();
        }

        return $this->render('view_counter', [
            'model' => $booking,
            'user' => $user,
            'address' => $address,
        ]);
    }

    public function actionView3($id)
    {
        return $this->render('view3', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdatebil($id)
    {
        $model = $this->findModel($id);
        $model->PMid = "4"; //ชำระผ่านธนาคาร
        $model->Bstatus = "จอง";
        $model->save();

        return $this->redirect(['chbooking']);
    }

    public function actionUpdatestatus($id, $id2)
    {
        $model = $this->findModel2($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->Rimg = $model->upload($model, 'Rimg');
            $model->RSid = "6";//ทำความสะอาด
//            $model->save();
            $model2 = Booking::findOne($id2);
            $model2->Bstatus = "เช็คเอ้าท์";
//            $model2->save();

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

    public function actionUpdatestatus2($id, $id2)
    {
        $model = $this->findModel2($id);

        $model->RSid = "4"; //เข้าพักแล้ว
        $model->save();

        $model2 = Booking::findOne($id2);
        $model2->Bstatus = "เช็คอิน";
        $model2->save();

        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search_counter(Yii::$app->request->queryParams);

        return $this->render('index5', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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

            $model->Bbil = $model->upload2($model, 'Bbil');

            $model->Bstatus = "จอง";

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->Bid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdate_counter($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view_counter', 'id' => $model->Bid]);
        }

        return $this->render('update_counter', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return int|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpload2($id)
    {
        date_default_timezone_set('asia/bangkok');
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post(),'')) {
            $model->Bbil = $model->upload($model, 'Bbil');

            $BillImage = $model->Bbil;

            if ($BillImage == null || is_null($BillImage) || empty($BillImage)) {
                Yii::$app->getSession()->setFlash('Oops', [
                    'body' => 'กรุณาเลือกภาพสลิปการชำระเงินและอัพโหลด เพื่อยืนยันการชำระเงิน!',
                    'type' => 'warning',
                ]);

                return $this->render('view3', [
                    'model' => $this->findModel($id),
                ]);
            }

            $model->Bstatus = "รอยืนยัน";
            $model->PMid = "6";// รอการยืนยัน

            if ($model->save()) {
                Yii::$app->getSession()->setFlash('Oops', [
                    'body' => 'อัพโหลดใบเสร็จชำระเงินเสร็จเรียบร้อย! กรุณารอสักครู่...เจ้าหน้าที่กำลังดำเนินการยืนยันใบเสร็จของคุณ',
                    'type' => 'success',
                ]);
                return $this->redirect(['index4']);
            }

            Yii::$app->getSession()->setFlash('Oops', [
                'body' => 'อัพโหลดใบเสร็จชำระเงิน ไม่สำเร็จ!',
                'type' => 'error',
            ]);
            return $this->redirect(['view3', 'id' => $model->Bid]);
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
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDelete_counter($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index5']);
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

    protected function findUsersModel($id)
    {
        if (($model2 = Users::findOne($id)) !== null) {
            return $model2;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findAddressById($id)
    {
        if (($model2 = Address::find()->where(['ADid' => $id])->one()) != null) {
            return ($model2);
        } else {
            return null;
        }
    }

    protected function findModel3($id)
    {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPrintslip($id)
    {
        $model = $this->findModel($id);

        $user = $this->findUsersModel($model->Uid);

//        return print("<pre>".print_r($user,true)."</pre>");

        $content = $this->renderPartial('print_money', [
            'model' => $model,
            'user' => $user,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $content,
            'filename' => 'your_filename.pdf',
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
//                'format' => Pdf::FORMAT_A4,
            'format' => [110, 136],
            'cssFile' => '@frontend/pdf.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => [
                'title' => 'Print Slip',
            ],
            'methods' => [
            ]
        ]);

        return $pdf->render();
    }

    public function actionCheckout($id, $roomid)
    {
//        return print ($id .' ,'. $roomid);
        $room = $this->findModel2($roomid);
        $room->RSid = 6;//ทำความสะอาด
        $room->save();

        $booking = Booking::findOne($id);
        $booking->Bstatus = 'เช็คเอ้าท์';
        if ($booking->save()) {

            Yii::$app->getSession()->setFlash('Oops', [
                'body' => 'การเช็คเอ้าท์สำเร็จ!',
                'type' => 'success',
            ]);

            return $this->redirect(['index3']);
        }

        return $this->redirect(['index3']);
    }

}

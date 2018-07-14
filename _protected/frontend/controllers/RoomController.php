<?php

namespace frontend\controllers;

use frontend\models\Booking;
use frontend\models\Users;
use frontend\models\UsersSearch;
use kartik\mpdf\Pdf;
use Yii;
use frontend\models\Room;
use frontend\models\RoomSearch;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoomController implements the CRUD actions for Room model.
 */
class RoomController extends Controller
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
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        Yii::$app->user->returnUrl = Yii::$app->request->referrer;
        return parent::beforeAction($action);
    }

    /**
     * Lists all Room models.
     * @return mixed
     * @throws \yii\db\Exception
     */
    public function actionIndex()
    {
        $searchModel = new RoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dateNow = date('Y-m-d');
        $query2 = new Query();
        $query2->select('Pdistant')
            ->from('promotion')
            ->andFilterWhere(['<=', 'Pdatestart', $dateNow])
            ->andFilterWhere(['>=', 'Pdateend', $dateNow]);
        $command = $query2->createCommand();
        $data = $command->queryAll();
        if (count($data) == 0) {
            $p = 0;
        } else {
            foreach ($data as $item1) {
                $p = $item1['Pdistant'];
            }
//            $p =50;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'p' => $p,
        ]);
    }

    public function actionIndex_counter()
    {
        $searchModel = new RoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $searchUser = new UsersSearch();
        $dataUserProvider = $searchUser->search(Yii::$app->request->queryParams);
        $dataUserProvider->pagination->pageSize = 3;

        $dateNow = date('Y-m-d');
        $query2 = new Query();
        $query2->select('Pdistant')
            ->from('promotion')
            ->andFilterWhere(['<=', 'Pdatestart', $dateNow])
            ->andFilterWhere(['>=', 'Pdateend', $dateNow]);
        $command = $query2->createCommand();
        $data = $command->queryAll();
        if (count($data) == 0) {
            $p = 0;
        } else {
            foreach ($data as $item1) {
                $p = $item1['Pdistant'];
            }
//            $p =50;
        }

        return $this->render('index_counter', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchUser' => $searchUser,
            'dataUserProvider' => $dataUserProvider,
            'p' => $p,
        ]);
    }

    /**
     * Lists all Room models.
     * @return mixed
     */
    public function actionIndex2()
    {
        $searchModel = new RoomSearch();
        $dataProvider = $searchModel->search3(Yii::$app->request->queryParams);


        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'p' => $p,

        ]);
    }

    public function actionIndex3()
    {
        $searchModel = new RoomSearch();
//        $dataProvider = $searchModel->search3(Yii::$app->request->queryParams);
        $query = Room::find()->where('RSid = 6');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $this->render('index3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'p' => $p,

        ]);
    }

    /**
     * Displays a single Room model.
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

    public function actionView2($id)
    {
        return $this->render('view2', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Room model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Room();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->Rimg = $model->upload($model, 'Rimg');
            $model->save();
            return $this->redirect(['view', 'id' => $model->Rid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Room model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->Rimg = $model->upload($model, 'Rimg');
            $model->save();
            return $this->redirect(['view', 'id' => $model->Rid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            $model->Rimg = $model->upload($model,'Rimg');
        $model->RSid = 5;
        $model->save();
        return $this->redirect(['index3']);
//        }

//        return $this->render('update', [
//            'model' => $model,
//        ]);
    }

    public function actionUpdatestatus($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->Rimg = $model->upload($model, 'Rimg');
            $model->save();

//            $searchModel = new BookingSearch();
//            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $content = $this->renderPartial('bilout', [
                'model' => $this->findModel($id),
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

    /**
     * Deletes an existing Room model.
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
     * Finds the Room model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Room the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Room::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param null $roomId
     * @param null $price
     * @param null $amt
     * @param null $sdate
     * @param null $edate
     * @param null $p
     * @param null $RTname
     * @return mixed
     */
    public function actionPdf($roomId = null, $price = null, $amt = null, $sdate = null, $edate = null, $p = null, $rtname = null, $rsname = null)
    {
        date_default_timezone_set('asia/bangkok');
        if (Yii::$app->user->isGuest) {
//            $this->setReturnUrl(Yii::$app->request->getUrl());
            return $this->redirect(['site/login']);
        }
//        $searchModel = new RoomSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$roomId);
        $model = Room::findOne(['Rid' => $roomId]);
        $date = $sdate . ' - ' . $edate;
        $price_befor = $p;
        $total = $price * $amt;
        $roomType = $rtname;
        $roomStatus = $rsname;
        $userId = Yii::$app->user->identity->getId(); // รหัสผู้ใช้

        //ส่งเมล์
        $users = $this->findModel2($userId);
        \Yii::$app->mail->compose('@app/mail/layouts/register', [
            'fname' => $users->Ufname,
            'lname' => $users->Ulname,
            'Rnumber' => $model->Rnumber,
            'in' => $sdate,
            'out' => $edate,
            'numday' => $amt,
            'Rimg' => $model->Rimg,
            'Rname' => $model->Rname,
            'total' => $total,
        ])
            ->setFrom(['systemudon@gmail.com' => 'I-Resort'])
            ->setTo($users->Uemail)
            ->setSubject('การจองห้อง ')
            ->send();


        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_preview', [
            'model' => $model,
            'roomType' => $roomType,
            'roomStatus' => $roomStatus,
            'daterange' => $date,
            'days' => $amt,
            'p' => $price_befor,
            'total' => $total,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => [100, 202],
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@frontend/pdf.css',
            // any css to be embedded if required
            'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Preview Report Case: ' . $roomId],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>[''],
                //'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        $booking = new Booking();
        $booking->Bdate = date('Y-m-d H:i:s') . "";
        $booking->Rid = $roomId . "";
        $booking->Btotal = $total . "";
        $booking->Bnday = $amt . "";
        $booking->Uid = $userId . "";
        $booking->Bdatein = $sdate;
        $booking->Bdateout = $edate;
        $booking->PMid = "3";
        $booking->month = date('m');
        $booking->year = date('Y');
        $booking->Bstatus = "จอง";
        $booking->save();

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    protected function findModel2($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPaymoney($roomId = null, $price = null, $amt = null, $sdate = null, $edate = null, $p = null, $rtname = null, $rsname = null, $userid = null)
    {
        date_default_timezone_set('asia/bangkok');

        $model = Room::findOne(['Rid' => $roomId]);
        $date = $sdate . ' - ' . $edate;
        $price_befor = $p;
        $total = $price * $amt;
        $roomType = $rtname;
        $roomStatus = $rsname;

        if ($userid == null) {
            $userId = Yii::$app->user->identity->getId(); // รหัสผู้ใช้
        } else {
            $userId = $userid; // รหัสผู้ใช้
        }

//        return var_dump('userid: ' . $userId);

        // booking
        $booking = new Booking();
        $booking->Bdate = date('Y-m-d H:i:s') . "";
        $booking->Rid = $roomId . "";
        $booking->Btotal = $total . "";
        $booking->Bnday = $amt . "";
        $booking->Uid = $userId . "";
        $booking->Bdatein = $sdate;
        $booking->Bdateout = $edate;
        $booking->PMid = "5";// สถานะ จ่ายสด
        $booking->month = date('m');
        $booking->year = date('Y');
        $booking->Bstatus = "จอง";
        $booking->save();

        return $this->redirect(['booking/index5']);
//        return print "test";
    }


}

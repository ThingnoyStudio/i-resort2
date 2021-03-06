<?php

namespace frontend\controllers;

use frontend\models\Orderdetail;
use frontend\models\Orders;
use Yii;
use frontend\models\Food;
use frontend\models\FoodSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FoodController implements the CRUD actions for Food model.
 */
class FoodController extends Controller
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
     * Lists all Food models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FoodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex2()
    {
        $searchModel = new FoodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex3()
    {
        $searchModel = new FoodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
public function actionIndex_food()
    {
        $searchModel = new FoodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_food', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Food model.
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
     * Creates a new Food model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Food();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->Fimg = $model->upload($model,'Fimg');
            $model->save();
            return $this->redirect(['view', 'id' => $model->Fid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Food model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->Fimg = $model->upload($model,'Fimg');
            $model->save();
            return $this->redirect(['view', 'id' => $model->Fid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Food model.
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
     * Finds the Food model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Food the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Food::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPaymoney($foodId = null, $price = null, $amt = null, $roomId = null)
    {
        date_default_timezone_set('asia/bangkok');

        $food = Food::findOne(['Fid' => $foodId]);

        $total_price = $price * $amt;// ราคาสุทธิ
        $amts = $amt;// จำนวน
        $FId = $foodId;// รหัสอาหาร
        $userId = Yii::$app->user->identity->getId(); // รหัสผู้ใช้
        $Rid = $roomId; // รหัสห้อง ถ้าเป็น 0 คือซื้อกลับบ้าน ไม่ให้ไปส่งที่ห้อง

//        return var_dump('userid: ' . $userId);

        // ordering
        $orders = new Orders();
        $orders->Odate = date('Y-m-d H:i:s') . "";
        $orders->Optotal = $total_price . "";
        $orders->Pid = '5';
        $orders->Bid = $Rid;
        $orders->save();

        $od = new Orderdetail();
        $od->Fid = $FId;
        $od->ODnum = $amts;
        $od->Oid = $orders->Oid;

        $od->save();

        return $this->redirect(['orders/index']);
//        return print "test";
    }


}

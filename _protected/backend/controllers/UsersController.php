<?php

namespace backend\controllers;

use backend\models\Address;
use backend\models\AddressSearch;
use common\models\User;
use frontend\models\SignupForm;
use http\Exception;
use Yii;
use backend\models\Users;
use backend\models\UsersSearch;
use yii\bootstrap\Html;
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
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new AddressSearch();
        $dataProvider = $searchModel->search($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
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

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->Uimg = $model->upload($model, 'Uimg');
            $model->save();
            return $this->redirect(['view', 'id' => $model->Uid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findAddressModel($id)->delete();

        $this->findUserModel($id)->delete();

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

    protected function findAddressById($id)
    {
        if (($model2 = Address::find()->where(['ADid' => $id])->one()) != null) {
            return ($model2);
        } else {
            return null;
        }
    }

    protected function findAddressModel($id)
    {
        if (($model2 = Address::find()->where(['Uid' => $id])->one()) != null) {
            return ($model2);
        } else {
            return null;
        }
    }

    protected function findUserModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
        }
    }

    public function actionView_counter($id)
    {
        $model = $this->findModel($id);
        $address = null;
        if ($model->ADid) {
            $address = $this->findAddressById($model->ADid);
        }
        if (!$address) {
            $address = new Address();
        }

//        return print($aid);
//        return print("<pre>" . print_r($address, true) . "</pre>");

        return $this->render('view_counter', [
            'model' => $model,
            'model2' => $address,
        ]);
    }

    public function actionSignup()
    {
        $model_user = new Users();
        $model_address = new  Address();

        // get setting value for 'Registration Needs Activation'
        $rna = Yii::$app->params['rna'];

        // if 'rna' value is 'true', we instantiate SignupForm in 'rna' scenario
        $model = $rna ? new SignupForm(['scenario' => 'rna']) : new SignupForm();

        // collect and validate user data
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // try to save user data in database
            if ($user = $model->signup()) {
                // if user is active he will be logged in automatically ( this will be first user )
                if ($user->status === User::STATUS_ACTIVE) {
//                    if (Yii::$app->getUser()->login($user)) {

                    // insert data to table
                    if ($model_user->load(Yii::$app->request->post()) && $model_user->validate()) {
                        $model_user->Uid = $user->id;
                        $model_user->USid = 1;
                        $model_user->Uemail = $user->email;
                        $model_user->iduser = $user->id;
                        $model_user->Uimg = $model_user->upload($model_user, 'Uimg');

                        if ($model_address->load(Yii::$app->request->post()) && $model_address->validate()) {
                            try {
                                $model_address->Uid = $user->id.'';
                                if ($model_address->save()) {

                                    $model_user->ADid = $model_address->ADid;
                                    $model_user->save();

                                    return $this->redirect(['view_counter', 'id' => $model_user->Uid]);
                                } else {
                                    return print 'error1_In';
                                }
                            } catch (Exception $ex) {
                                return print 'error: ' . $ex->getMessage();
                            }

                        } else {
                            return print 'cannot validate address';
                        }

                    } else {
                        return print 'cannot validate model Users';
                    }

                } // activation is needed, use signupWithActivation()
                else {
                    $this->signupWithActivation($model, $user);

                    return $this->refresh();
                }
            } // user could not be saved in database
            else {
                // display error message to user
                Yii::$app->session->setFlash('error',
                    "We couldn't sign you up, please contact us.");

                // log this error, so we can debug possible problem easier.
                Yii::error('Signup failed! 
                    User ' . Html::encode($user->username) . ' could not sign up.
                    Possible causes: something strange happened while saving user in database.');

//                return $this->refresh();
                return print 'error: couldn\'t sign you up';
            }
        }

        return $this->render('create_counter', [
            'user' => $model_user,
            'address' => $model_address,
            'model' => $model,
        ]);
    }

    private function signupWithActivation($model, $user)
    {
        // try to send account activation email
        if ($model->sendAccountActivationEmail($user)) {
            Yii::$app->session->setFlash('success',
                'Hello ' . Html::encode($user->username) . '. 
                To be able to log in, you need to confirm your registration. 
                Please check your email, we have sent you a message.');
        } // email could not be sent
        else {
            // display error message to user
            Yii::$app->session->setFlash('error',
                "We couldn't send you account activation email, please contact us.");

            // log this error, so we can debug possible problem easier.
            Yii::error('Signup failed! 
                User ' . Html::encode($user->username) . ' could not sign up.
                Possible causes: verification email could not be sent.');
        }
    }

    public function actionUpdate_counter($id)
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
                            return $this->redirect(['view_counter', 'id' => $model->Uid]);
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
            return $this->render('update_counter', [
                'model' => $model,
                'model2' => $model2,
            ]);
        }
    }


}

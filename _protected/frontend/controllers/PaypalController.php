<?php

namespace frontend\controllers;

use cinghie\paypal\components\Helper;
use frontend\models\Booking;
use frontend\models\Orderdetail;
use frontend\models\Orders;
use frontend\models\TransactionPaypal;
use frontend\models\Users;
use Yii;
use frontend\models\Food;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;

use frontend\models\Room;

/**
 * FoodController implements the CRUD actions for Food model.
 */
class PaypalController extends Controller
{
    public $baseUrl = 'http://localhost/i-resort2/';

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
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        Yii::$app->user->returnUrl = Yii::$app->request->referrer;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->redirect(['room/index']);
    }

    //region Room
    public function actionPaypal($roomId = null, $price = null, $amt = null, $sdate = null, $edate = null, $userid = null, $payfrom = null)
    {
        date_default_timezone_set('asia/bangkok');
        if (Yii::$app->user->isGuest) {
//            $this->setReturnUrl(Yii::$app->request->getUrl());
            return $this->redirect(['site/login']);
        }

        if ($this->findDdate($sdate, $edate)) {
            Yii::$app->getSession()->setFlash('Oops', [
                'body' => 'ช่วงเวลานี้ มีการจองแล้วกรุณาเลือกช่วงเวลาใหม่: ',
                'type' => 'warning',
//                        'options'=>['class'=>'alert-warning']
            ]);
            if ($payfrom == 'counter') {
                return $this->redirect(['room/index_counter']);
            } else {
                return $this->redirect(['room/index']);
            }

        }

        if ($roomId && $price && $amt != 0) {
            // init variable
            $room = Room::findOne(['Rid' => $roomId]);
            $total_price = $price * $amt;// ราคาสุทธิ
            $days = $amt;// จำนวนวัน
            $RId = $roomId;// รหัสห้อง
            if ($userid == null) {
                $userId = Yii::$app->user->identity->getId(); // รหัสผู้ใช้
            } else {
                $userId = $userid; // รหัสผู้ใช้
            }
            $s_date = $sdate;// วันที่เข้าพัก
            $e_date = $edate;// วันที่ออก

//            return var_dump(number_format($total_price,2, '.', ''));

            $payer = Helper::setPaypalPayer("paypal");
            $item1 = Helper::setPaypalItem('ห้องพักหมายเลข ' . $room->Rnumber, "THB", $days, "R" . $RId, $price);
            $itemList = Helper::setPaypalItemList([$item1]);
            $details = Helper::setPaypalDetails(0.00, 0.00, $total_price);
            $amount = Helper::setPaypalAmount("THB", '' . $total_price, $details);
            $transaction = Helper::setPaypalTransaction($amount, "อัยรีสอร์ท สะดวก สะอาด ปลอดภัย", uniqid(), $itemList);

            if ($payfrom == 'counter') {
                $redirectUrls = Helper::setPaypalRedirectUrls($this->baseUrl . 'paypal/pay/?approved=true&payfrom=' . $payfrom,
                    $this->baseUrl . 'paypal/cancel/?approved=false&payfrom=' . $payfrom);
            } else {
                $redirectUrls = Helper::setPaypalRedirectUrls($this->baseUrl . "paypal/pay/?approved=true",
                    $this->baseUrl . "paypal/cancel/?approved=false");
            }

            $payment = Helper::setPaypalPayment("sale", $payer, $redirectUrls, $transaction);

            try {
                $payment->create(Yii::$app->paypal->getApiContext());

                $hash = md5($payment->getId());
                Yii::$app->session['paypal_hash'] = $hash;

                $transactionPaypal = new TransactionPaypal;
                $transactionPaypal->user_id = $userId;
                $transactionPaypal->payment_id = $payment->getId();
                $transactionPaypal->product_id = $room->Rid;
                $transactionPaypal->create_time = '-';
                $transactionPaypal->update_time = '-';
                $transactionPaypal->hash = $hash;
                $transactionPaypal->save();

                //save booking
                $booking = new  Booking();
                $booking->Bdate = date('Y-m-d H:i:s') . "";
                $booking->Rid = $RId . "";
                $booking->Btotal = $total_price . "";
                $booking->Bnday = $days . "";
                $booking->Uid = $userId . "";
                $booking->Bdatein = $s_date;
                $booking->Bdateout = $e_date;
                $booking->Bstatus = 'จอง';
                $booking->Bbil = '-';
                $booking->PMid = "2";//ชำระผ่าน paypal
                $booking->month = date('m');
                $booking->year = date('Y');
                $booking->save();

                //แก้ไขสถานะห้อง
//                $rooms = Room::findOne($RId);
//                $rooms->RSid = 2;
//                $rooms->save();


                //ส่งเมล์
                $users = $this->findModel2($userId);
                \Yii::$app->mail->compose('@app/mail/layouts/register', [
                    'fname' => $users->Ufname,
                    'lname' => $users->Ulname,
                    'Rnumber' => $room->Rnumber,
                    'in' => $s_date,
                    'out' => $e_date,
                    'numday' => $days,
                    'Rimg' => $room->Rimg,
                    'Rname' => $room->Rname,
                    'total' => $total_price,
                ])
                    ->setFrom(['systemudon@gmail.com' => 'I-Resort'])
                    ->setTo($users->Uemail)
                    ->setSubject('การจองห้อง ')
                    ->send();


            } catch (PayPalConnectionException $ex) {
                Yii::$app->getSession()->setFlash('Oops', [
                    'body' => 'เกิดข้อผิดพลาดระหว่างชำระเงิน: ' . $ex->getMessage(),
                    'type' => 'error',
//                        'options'=>['class'=>'alert-warning']
                ]);

                if ($payfrom == 'counter') {
                    return $this->redirect(['room/index_counter']);
                } else {
                    return $this->redirect(['room/index']);
                }
            }
            if (is_array($payment->getLinks()) || is_object($payment->getLinks())) {
                foreach ($payment->getLinks() as $link) {
                    if ($link->getRel() == 'approval_url') {
                        $redirectUrl = $link->getHref();
                    }
                }
                $this->redirect($redirectUrl);
            }

        } else {
            return $this->redirect(['error']);
        }

        return false;
    }

    public function actionPay($approved = null, $PayerID = null, $payfrom = null)
    {
        if ($approved === 'true') {
            $transactionPayment = TransactionPaypal::findOne(['hash' => Yii::$app->session['paypal_hash']]);
//            var_dump($transactionPayment);

            // Get the Paypal payment
            $payment = Payment::get($transactionPayment->payment_id, Yii::$app->paypal->getApiContext());
            //var_dump($payment);

            $execution = new PaymentExecution();
            $execution->setPayerId($PayerID);
            //Execute Paypal payment (charge)
            $payment->execute($execution, Yii::$app->paypal->getApiContext());

            // Update transaction
            $transactionPayment->complete = 1;
            $transactionPayment->create_time = $payment->create_time;
            $transactionPayment->update_time = $payment->update_time;
            $transactionPayment->save();


            Yii::$app->session->remove('paypal_hash');

            //SEND Email
            /*$text = '
                You will download sourcode'.$transactionPayment->product->name.' in https://programemrthailand.com/account/download
            ';
            Yii::$app->mail->compose(['html' => '@app/mail-templates/html-email-01'])
                ->setFrom('support@programemrthailand.com')
                ->setTo($transactionPayment->user->email)
                ->setSubject('YesBootstrap - '.$transactionPayment->product->name)
                ->send();
            */
            if ($payfrom == 'counter') {
                return $this->redirect(['success', 'payfrom' => $payfrom]);
            } else {
                return $this->redirect(['success']);
            }

        } else {//if approved !== true
            return $this->redirect(['cancel']);
        }

    }

    public function actionSuccess($payfrom = null)
    {
        Yii::$app->getSession()->setFlash('Oops', [
            'body' => 'ชำระเงินเสร็จเรียบร้อย',
            'type' => 'success',
//                        'options'=>['class'=>'alert-warning']
        ]);

        if ($payfrom == 'counter') {
            return $this->redirect(['room/index_counter']);
        } else {
            return $this->redirect(['room/index']);
        }
//        return $this->render('success');
    }

    public function actionCancel($payfrom = null)
    {
        Yii::$app->getSession()->setFlash('Oops', [
            'body' => 'การชำระเงินถูกยกเลิก',
            'type' => 'warning',
//                        'options'=>['class'=>'alert-warning']
        ]);

        if ($payfrom == 'counter') {
            return $this->redirect(['room/index_counter']);
        } else {
            return $this->redirect(['room/index']);
        }
//        return $this->render('cancel');
    }

    public function actionError()
    {
        Yii::$app->getSession()->setFlash('Oops', [
            'body' => 'การทำงานผิดพลาด',
            'type' => 'warning',
//                        'options'=>['class'=>'alert-warning']
        ]);

        return $this->redirect(['room/index']);

    }
    //endregion

    //region Food
    /*** FOOD
     * @param null $foodId
     * @param null $price
     * @param null $amt
     * @param null $roomId
     * @param null $payfrom
     * @return bool|\yii\web\Response
     */
    public function actionPaypalfood($foodId = null, $price = null, $amt = null, $roomId = null, $payfrom = null)
    {
        date_default_timezone_set('asia/bangkok');
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        if ($foodId && $price && $amt != 0) {
            // init variable
            $food = Food::findOne(['Fid' => $foodId]);
            $total_price = $price * $amt;// ราคาสุทธิ
            $amts = $amt;// จำนวน
            $FId = $foodId;// รหัสอาหาร
            $userId = Yii::$app->user->identity->getId(); // รหัสผู้ใช้
            $Rid = $roomId; // รหัสห้อง ถ้าเป็น 0 คือซื้อกลับบ้าน ไม่ให้ไปส่งที่ห้อง

            $payer = Helper::setPaypalPayer("paypal");
            $item1 = Helper::setPaypalItem('' . $food->Fname, "THB", $amts, "F" . $FId, $food->Fprice);
            $itemList = Helper::setPaypalItemList([$item1]);
            $details = Helper::setPaypalDetails(0.00, 0.00, $total_price);
            $amount = Helper::setPaypalAmount("THB", '' . $total_price, $details);
            $transaction = Helper::setPaypalTransaction($amount, "อัยรีสอร์ท สะดวก สะอาด ปลอดภัย", uniqid(), $itemList);

            if ($payfrom == 'food') {
                $redirectUrls = Helper::setPaypalRedirectUrls($this->baseUrl . 'paypal/payfood/?approved=true&payfrom=' . $payfrom,
                    $this->baseUrl . 'paypal/cancelfood/?approved=false&payfrom=' . $payfrom);
            } else {
                $redirectUrls = Helper::setPaypalRedirectUrls($this->baseUrl . "paypal/payfood/?approved=true",
                    $this->baseUrl . "paypal/cancelfood/?approved=false");
            }

            $payment = Helper::setPaypalPayment("sale", $payer, $redirectUrls, $transaction);

            try {
                $payment->create(Yii::$app->paypal->getApiContext());

                $hash = md5($payment->getId());
                Yii::$app->session['paypal_hash'] = $hash;

                $transactionPaypal = new TransactionPaypal;
                $transactionPaypal->user_id = $userId;
                $transactionPaypal->payment_id = $payment->getId();
                $transactionPaypal->product_id = $food->Fid;
                $transactionPaypal->create_time = '-';
                $transactionPaypal->update_time = '-';
                $transactionPaypal->hash = $hash;
                $transactionPaypal->save();

                $orders = new Orders();
                $orders->Odate = date('Y-m-d H:i:s') . "";
                $orders->Optotal = $total_price . "";
                $orders->Pid = '2';//ชำระผ่าน paypal
                $orders->Bid = $Rid;
                $orders->save();

                $od = new Orderdetail();
                $od->Fid = $FId;
                $od->ODnum = $amts;
                $od->Oid = $orders->Oid;

                $od->save();


            } catch (PayPalConnectionException $ex) {
                Yii::$app->getSession()->setFlash('Oops', [
                    'body' => 'เกิดข้อผิดพลาดระหว่างชำระเงิน: ' . $ex->getMessage(),
                    'type' => 'error',
                ]);

                if ($payfrom == 'food') {
                    return $this->redirect(['food/index_food']);
                } else {
                    return $this->redirect(['food/index3']);
                }
            }
            if (is_array($payment->getLinks()) || is_object($payment->getLinks())) {
                foreach ($payment->getLinks() as $link) {
                    if ($link->getRel() == 'approval_url') {
                        $redirectUrl = $link->getHref();
                    }
                }
                $this->redirect($redirectUrl);
            }

        } else {
            Yii::$app->getSession()->setFlash('Oops', [
                'body' => 'เกิดข้อผิดพลาดระหว่างชำระเงิน',
                'type' => 'error',
            ]);
            return $this->redirect(['food/index3']);
        }

        return false;
    }

    public function actionPayfood($approved = null, $PayerID = null, $payfrom = null)
    {
        if ($approved === 'true') {
            $transactionPayment = TransactionPaypal::findOne(['hash' => Yii::$app->session['paypal_hash']]);
//            var_dump($transactionPayment);

            // Get the Paypal payment
            $payment = Payment::get($transactionPayment->payment_id, Yii::$app->paypal->getApiContext());
            //var_dump($payment);

            $execution = new PaymentExecution();
            $execution->setPayerId($PayerID);
            //Execute Paypal payment (charge)
            $payment->execute($execution, Yii::$app->paypal->getApiContext());

            // Update transaction
            $transactionPayment->complete = 1;
            $transactionPayment->create_time = $payment->create_time;
            $transactionPayment->update_time = $payment->update_time;
            $transactionPayment->save();


            Yii::$app->session->remove('paypal_hash');

            //SEND Email
            /*$text = '
                You will download sourcode'.$transactionPayment->product->name.' in https://programemrthailand.com/account/download
            ';
            Yii::$app->mail->compose(['html' => '@app/mail-templates/html-email-01'])
                ->setFrom('support@programemrthailand.com')
                ->setTo($transactionPayment->user->email)
                ->setSubject('YesBootstrap - '.$transactionPayment->product->name)
                ->send();
            */

            if ($payfrom == 'food') {
                return $this->redirect(['successfood', 'payfrom' => $payfrom]);
            } else {
                return $this->redirect(['successfood']);
            }

        } else {//if approved !== true
            return $this->redirect(['cancelfood']);
        }

    }

    public function actionSuccessfood($payfrom = null)
    {
        Yii::$app->getSession()->setFlash('Oops', [
            'body' => 'ชำระเงินเสร็จเรียบร้อย',
            'type' => 'success',
//                        'options'=>['class'=>'alert-warning']
        ]);

        if ($payfrom == 'food') {
            return $this->redirect(['food/index_food']);
        } else {
            return $this->redirect(['food/index3']);
        }
//        return $this->render('success');
    }

    public function actionCancelfood()
    {
        Yii::$app->getSession()->setFlash('Oops', [
            'body' => 'การชำระเงินถูกยกเลิก',
            'type' => 'warning',
//                        'options'=>['class'=>'alert-warning']
        ]);

        return $this->redirect(['food/index3']);
//        return $this->render('cancel');
    }

    //endregion

    protected function findModel2($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param null $sdate
     * @param null $edate
     * @return array
     * @throws Exception
     */
    public function findDdate($sdate, $edate)
    {
        return $check_date = Yii::$app->db->createCommand('select * from booking where \'' . $sdate . '\' between Bdatein and Bdatein or \'' . $edate . '\' between Bdateout and Bdateout')->queryAll();
    }

    /**
     * @return array
     * @throws Exception
     */
    public function actionChkdate()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $stDate = explode(":", $data['sDate'])[0];
            $enDate = explode(":", $data['eDate'])[0];
            $booking = $this->findDdate($stDate, $enDate); // your logic;
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                's_date' => $stDate,
                'ed' => $enDate,
                'booking' => $booking,
                'code' => 100,
            ];
        }
    }


}

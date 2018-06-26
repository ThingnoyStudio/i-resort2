<?php

namespace frontend\controllers;

use frontend\models\TransactionPaypal;
use Yii;
use frontend\models\Food;
use frontend\models\FoodSearch;
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
use frontend\models\RoomSearch;

/**
 * FoodController implements the CRUD actions for Food model.
 */
class PaypalController extends Controller
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

    public function actionCancel()
    {
//        Yii::$app->getSession()->setFlash('Oops', [
//            'body' => 'การทำงานผิดพลาด',
//            'type' => 'warning',
////                        'options'=>['class'=>'alert-warning']
//        ]);

        return $this->redirect(['room/index']);
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPay($approved = null, $PayerID = null)
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

            return $this->redirect(['success']);
        } else {//if approved !== true
            return $this->redirect(['cancel']);
        }

    }

    public function actionSuccess()
    {
        Yii::$app->getSession()->setFlash('Oops', [
            'body' => 'ชำระเงินเสร็จเรียบร้อย',
            'type' => 'success',
//                        'options'=>['class'=>'alert-warning']
        ]);

        return $this->redirect(['room/index']);
//        return $this->render('success');
    }

    public function actionPaypal($roomId, $price, $amt)
    {
        $product = Room::findOne(['Rid' => $roomId]);

        $total_price = $price * $amt;
        $payer = new Payer();
        $details = new Details();
        $amount = new Amount();
        $transaction = new Transaction();
        $payment = new Payment();
        $redirectUrls = new RedirectUrls();

        //Payer
        $payer->setPaymentMethod('paypal');

        //Details
        $details->setShipping('0.00')
            ->setTax('0.00')
            ->setSubtotal($total_price);
        //Amount
        $amount->setCurrency('THB')
            ->setTotal($total_price)
            ->setDetails($details);
        //Transaction
        $transaction->setAmount($amount)
            ->setDescription($product->Rname);

        //Payment
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions([$transaction]);

        //Redirect URLs
        $redirectUrls->setReturnUrl('http://localhost/i-resort2/paypal/pay/?approved=true')
            ->setCancelUrl('http://localhost/i-resort2/paypal/cancel/?approved=false');
        $payment->setRedirectUrls($redirectUrls);
        try {
            $payment->create(Yii::$app->paypal->getApiContext());

            $hash = md5($payment->getId());
            Yii::$app->session['paypal_hash'] = $hash;

            $transactionPaypal = new TransactionPaypal;
            $transactionPaypal->user_id = Yii::$app->user->getId();
            $transactionPaypal->payment_id = $payment->getId();
            $transactionPaypal->product_id = $product->Rid;
            $transactionPaypal->create_time = '-';
            $transactionPaypal->update_time = '-';
            $transactionPaypal->hash = $hash;

            $transactionPaypal->save();

        } catch (PayPalConnectionException $ex) {
//            echo ($ex);
            print("<pre>".print_r($ex,true)."</pre>");
//            $this->redirect('error');
        }
        if (is_array($payment->getLinks()) || is_object($payment->getLinks())) {
            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirectUrl = $link->getHref();
                }
            }
            $this->redirect($redirectUrl);
        }


        var_dump($payment->getLinks());
        print_r(Yii::$app->paypal);
//        return $this->render('room/index');
    }
}

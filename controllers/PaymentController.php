<?php

namespace app\controllers;

use Yii;
use PHPUnit\TextUI\ResultPrinter;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payee;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PPConnectionException;
use PayPal\Rest\ApiContext;
use app\components\UserHelper;
use app\models\Balance;
use app\models\Translation;
use app\models\User;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use app\controllers\BaseController;
use yii\filters\VerbFilter;



class PaymentController extends BaseController
{



    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'success', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                        'denyCallback' => function ($rule, $action) {
                            return $this->goBack();
                        },
                    ],
                    [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['@'],
                        'denyCallback' => function ($rule, $action) {
                            return \Yii::$app->getUser()->loginRequired();
                        },
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                        'denyCallback' => function ($rule, $action) {
                            return $this->goHome();
                        },
                    ],
                ],

            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AcUkbdtN6Tto3T9xu9FZJGfBtU8DCrfy8XUvVCUN0pTkTuEt8ICQbqxdGqlc43_X5dEwSL-wOzhVJUlD',
                'EMdubpGHRxTbQSxdWADuHLFDTBkjIPZtK2OMW2jtuK9lBRnVVPp5EF0aqFTJHiiZRdK4WwiQ38zw6oZy'
            )
        );

        $apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => false,
                'log.FileName' => '',
                'log.LogLevel' => 'FINE',
                'validation.level' => 'log'
            )
        );

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
   // ### Itemized information
   // (Optional) Lets you specify item wise
   // information
        $item1 = new Item();
        $item1->setName('Donation for school')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(80);
        $item2 = new Item();
        $item2->setName('pay for referral')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(20);
        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));
   // ### Additional payment details
   // Use this optional field to set additional
   // payment information such as tax, shipping
   // charges etc.
        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(100);
   // ### Amount
   // Lets you specify a payment amount.
   // You can also specify additional details
   // such as shipping, tax.
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(100)
            ->setDetails($details);
   // ### Transaction
   // A transaction defines the contract of a
   // payment - what is the payment for and who
   // is fulfilling it. 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
   // ### Redirect urls
   // Set the urls that the buyer must be redirected to after 
   // payment approval/ cancellation.
        $baseUrl = 'http://localhost' . Yii::$app->getUrlManager()->getBaseUrl();

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/index.php?r=payment/success")
            ->setCancelUrl("$baseUrl/index.php?r=payment/error");
   // ### Payment
   // A Payment Resource; create one using
   // the above types and intent set to 'sale'
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $request = clone $payment;

        try {
            $payment->create($apiContext);
            $hash = md5($payment->getId());
            $_SESSION['paypal_hash'] = $hash;
            $trsns = new Translation;
            $trsns->user_id = Yii::$app->user->id;
            $trsns->hash = $hash;
            $trsns->payment_id = $payment->getId();
            $trsns->completed = 0;
            $trsns->save();
        } catch (Exception $ex) {
       // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            exit(1);
        }

        $approvalUrl = $payment->getApprovalLink();


        return $this->redirect($approvalUrl);


    }


    public function  actionSuccess()
    {
        $paymentId = $_GET['paymentId'];
        $payerID = $_GET['PayerID'];
        $trans= Translation::find()->where(['payment_id'=>$paymentId])->one();
        if(!empty($trans)){
            $trans->completed=1;
            $user = $this->findModel(Yii::$app->user->id);
            $user->status=User::STATUS_ACTIVE;
            $userRfId= $user->referral['user_id'];
            if (!is_array($userRfId)&& !empty($userRfId)) {
                $balance= Balance::find()->where(['user_id'=>$userRfId])->one();
                $balance->balance+=20;
                
                if(!$balance->save()){
                    var_dump($balance->getErrors());
                }
            }


            $user->save();
            $trans->save();
          
            
            UserHelper::setBalance(Yii::$app->user->id);
            UserHelper::setReferralCode(Yii::$app->user->id);

            return $this->redirect(['user/profile']);
        }
        return  $this->redirect(['site/payment']);
        
    }


    public function actionError()
    {
        return  $this->redirect(['site/payment']);
    }


     /**
     * Finds the Ads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return user the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }
}


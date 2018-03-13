<?php

namespace app\controllers;

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
use Yii;
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
            'AeO8hUruUMAr8mH2pY9t63mefVJnrJCAZf3gevFwAc4yEWSFV-YijJF000zBpX5JUIyKdQYIsV2Dse_S',
            'EF5ls3mJ2r6cRCPNDmKQUAnwIJDyXfX8lguSfWNheFl5GOB3c5wjRPc4q2C8XBatPL2cT9ImQAtdKRK3'
         )
        );
        
        $apiContext->setConfig([
         'mode'=>'sandbox',
         'http.ConnectionTimeOut'=>30,
         'log.LogEnabled'=>false,
         'log.FileName'=>'',
         'log.LogLevel'=>'FINE',
         'validation.level'=>'log'
        ]);

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $item1 = new Item();
        $item1->setName('Donation for school')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("100") // Similar to `item_number` in Classic API
            ->setPrice(80);
        $item2 = new Item();
        $item2->setName('Referal Rent')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("200") // Similar to `item_number` in Classic API
            ->setPrice(20);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(0);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);   

        $payee = new Payee();
        $payee->setEmail(Yii::$app->user->identity->email);


        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("donation for school")
            ->setPayee($payee)
            ->setInvoiceNumber(uniqid());


           
        $baseUrl = 'http://'.Yii::$app->getUrlManager()->getBaseUrl();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/index.php?r=payment/success")
                     ->setCancelUrl("$baseUrl/index.php?r=payment/error"); 

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $request = clone $payment;
       
      

        try {
            $payment->create($apiContext);
            $hash= md5($payment->getId());
            $_SESSION['paypal_hash']=$hash;
            $trsns=new Translation;
            $trsns->user_id= Yii::$app->user->id;
            $trsns->hash=$hash;
            $trsns->payment_id=$payment->getId();
            $trsns->completed=0;
            $trsns->save();

        } catch (Exception $ex) {
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
                $balance->balance=20;
                
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


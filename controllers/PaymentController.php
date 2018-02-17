<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
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
use PayPal\Rest\ApiContext;
use app\models\Translation;
use PayPal\Exception\PPConnectionException;


class PaymentController extends Controller
{

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
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(2);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));

        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);   

        $payee = new Payee();
        $payee->setEmail("stevendcoffey-facilitator@gmail.com");


        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setPayee($payee)
            ->setInvoiceNumber(uniqid());


           
        $baseUrl = 'http://localhost/'.Yii::$app->getUrlManager()->getBaseUrl();
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
            $user->save();
            $trans->save();
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


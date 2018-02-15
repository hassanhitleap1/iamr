<?php

namespace app\controllers;

use Yii;
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
        } catch (Exception $ex) {
            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            exit(1);
        }
        $approvalUrl = $payment->getApprovalLink();

        
         $url=$payment->links[1]->href;
        

   
        
        return $this->redirect($url); 


        return $this->render('index');
    }

    public function  actionSuccess(){
        return "success";
    }

    public function actionError()
    {
        return  "error";
    }
}


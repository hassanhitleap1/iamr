<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payee;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


class PaymentController extends Controller
{

    public function actionIndex(){
        
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

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");


        $baseUrl = 'http://localhost'.Yii::$app->getUrlManager()->getBaseUrl().'/index.php?r=payment';
  
        $redirectUrls = new RedirectUrls();
        
        $redirectUrls->setReturnUrl("$baseUrl/done?success=true")
            ->setCancelUrl("$baseUrl/error?success=false");
            
    
        $payment = new Payment();
        $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

        $request = clone $payment;

      
            


        try {
            $payment->create($apiContext);

            $this->redirect( $redirectUrls);
        } catch (Exception $ex) {   
            
           // ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            exit(1);

        }
        $approvalUrl = $payment->getApprovalLink();

        var_dump($approvalUrl );
        return $this->redirect($approvalUrl);
        exit;
        return $payment;  
    }

    public function actionDone(){
        return "done";
    }
}


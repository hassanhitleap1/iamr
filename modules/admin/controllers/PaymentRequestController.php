<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\PaymentRequest;
use app\models\admin\PaymentRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\modules\admin\controllers\BaseController;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
/**
 * PaymentRequestController implements the CRUD actions for PaymentRequest model.
 */
class PaymentRequestController extends BaseController
{
    

    /**
     * Lists all PaymentRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaymentRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PaymentRequest model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAccept($id){

        $model = $this->findModel($id);
        if (!$model->accept) {
            $model->accept = PaymentRequest::ACCPET_PAYMENT;
            $balanceModel= \app\models\Balance::find()->where(['user_id'=>$model->user_id])->one();
            
            if( $model->value <= $balanceModel->balance){
                $balanceModel->balance -= $model->value;
                $balanceModel->save();
            }
            $model->save(false);
        } 
        $payouts = new \PayPal\Api\Payout();
        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();
        
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
// ### NOTE:
// You can prevent duplicate batches from being processed. If you specify a `sender_batch_id` that was used in the last 30 days, the batch will not be processed. For items, you can specify a `sender_item_id`. If the value for the `sender_item_id` is a duplicate of a payout item that was processed in the last 30 days, the item will not be processed.
// #### Batch Header Instance
$senderBatchHeader->setSenderBatchId(uniqid())
    ->setEmailSubject("You have a Payout!");
// #### Sender Item
// Please note that if you are using single payout with sync mode, you can only pass one Item in the request
$senderItem = new \PayPal\Api\PayoutItem();
$senderItem->setRecipientType('Email')
    ->setNote('Thanks for your patronage!')
    ->setReceiver('shirt-supplier-one@gmail.com')
    ->setSenderItemId("2014031400023")
    ->setAmount(new \PayPal\Api\Currency('{
                        "value":"1.0",
                        "currency":"USD"
                    }'));
$payouts->setSenderBatchHeader($senderBatchHeader)
    ->addItem($senderItem);
// For Sample Purposes Only.
$request = clone $payouts;
// ### Create Payout
try {
    $output = $payouts->createSynchronous($apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Created Single Synchronous Payout", "Payout", null, $request, $ex);
    exit(1);
}
// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Created Single Synchronous Payout", "Payout", $output->getBatchHeader()->getPayoutBatchId(), $request, $output);
return $output;
        return $this->redirect(['index']);
    }

    /**
     * Finds the PaymentRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PaymentRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaymentRequest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

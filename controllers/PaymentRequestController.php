<?php

namespace app\controllers;

use Yii;
use app\models\PaymentRequest;
use app\models\admin\PaymentRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\BaseController;


/**
 * PaymentRequestController implements the CRUD actions for PaymentRequest model.
 */
class PaymentRequestController extends BaseController
{
    /**
     * @inheritdoc
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
     * Lists all PaymentRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new PaymentRequest();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id= Yii::$app->user->id;
            $model->create_at = date('Y-m-d H:m:s');
            $model->accept= PaymentRequest::NOT_ACCPET_PAYMENT;
            
            if($model->validate()){
                Yii::$app->session->setFlash('record', 'the payment request submited ');
                return $this->redirect(['index']);
            }
           
        } 
            if(Yii::$app->user->identity->balance !==null && Yii::$app->user->identity->balance->balance>0) {
             return $this->render('index', ['model' => $model,
             'balance'=>Yii::$app->user->identity->balance->balance,
            ]);

            }else {
                throw new  \yii\web\NotFoundHttpException("can not requst pay becous don ont have maonty", 1);
                
            }
        
       
        
    }



  

    protected function findModel($id)
    {
        if (($model = PaymentRequest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

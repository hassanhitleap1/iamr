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
                        'actions' => ['index', 'alarm', 'error'],                        'allow' => true,
                        'roles' => ['?'],
                        'denyCallback' => function ($rule, $action) {
                            return $this->goBack();
                        },
                    ],
                    [
                        'actions' => ['index','alarm'],
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
                return $this->redirect(['user/alarm']);
                
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
<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\PaymentRequest;
use app\models\admin\PaymentRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\modules\admin\controllers\BaseController;

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
            $model->save(false);
        } 
     
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

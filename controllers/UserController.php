<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use yii\web\NotFoundHttpException;
use app\models\Balance;
use app\models\ReferralCode;
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        return 'index';
    }

    /**
     * 
     */
    public function actionProfile(){
        $user= $this->findModel(Yii::$app->user->id);
        return $this->render('profile',['user'=>$user]);
    }


    public function actionReferral(){
        if (Yii::$app->user->identity->status) {
            $blance= Balance::find()->where(['user_id'=>Yii::$app->user->id])->one();
            $referralCode=ReferralCode::find()->where(['user_id'=>Yii::$app->user->id])->one();
            return $this->render('referral',[
                'balance'=>$blance,
                'referralCode'=>$referralCode,
            ]);
        }else {
            return $this->render('alarm');
            
        }
        
    }

    /**
     * edit profile 
     */
    public function actionEdit(){

        $model=$this->findModel(Yii::$app->user->id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/profile']);
        } else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }


        /**
     * Finds the Ads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}   

?>
<?php

namespace app\controllers;
use Yii;
use app\models\Balance;
use app\models\EditForm;
use app\models\ReferralCode;
use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\controllers\BaseController;
use app\models\Referral;
use app\components\UserHelper;


class UserController extends BaseController
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
                        'actions' => ['profile', 'referral', 'edit', 'alarm','verification-email'],
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
        return 'index';
    }
    public function actionVerificationEmail(){
        $codeValidate=@$_GET['verification_email'];   
        if(!empty($codeValidate)){
            if(Yii::$app->user->identity->verification_email == $codeValidate){
            $model = $this->findModel(Yii::$app->user->id);
            $model->verification_email= 1;
            $model->save();
            UserHelper::sendEmailValidation();
            return $this->redirect(['/']);
            }
        }
        return $this->render('verification-email');
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
            //SELECT * FROM `user` WHERE id in (SELECT user_id_referral FROM referral WHERE user_id=26)
            $subQuery = Referral::find()->select('user_id_referral')->where(['user_id'=>Yii::$app->user->id]);
            $query = User::find()->where(['in', 'id', $subQuery]);
            $referalUsers = $query->all();
           
            $coin = User::find()->select('coin')->where(['id' => Yii::$app->user->id])
                ->limit('1')
                ->one();
 
        
            return $this->render('referral',[
                'balance'=>$blance,
                'referralCode'=>$referralCode,
                'referalUsers'=>$referalUsers,
                'coin'=> $coin,
            ]);
        }else {
            return $this->render('alarm');
            
        }
        
    }
    
    /**
     * edit profile 
     */
    public function actionEdit(){
            $id = Yii::$app->user->id;

            $user = $this->findModel($id);
            $model =new EditForm;
    
        if ($model->load(Yii::$app->request->post()) ) {
            $model->file = UploadedFile::getInstance($model, 'file');
             
            if(!empty($model->file)){
                $image_path='image/' . md5(uniqid(rand(), true))  . '.'  . $model->file->extension;  
                $model->file->saveAs($image_path,false);
               $user->image_name = $image_path;
            }

 
            if ($model->validate()) {
                $user->full_name=$model->full_name;
                $user->about_me = $model->about_me;
                $user->save(false);

                return $this->redirect(['user/profile']);
            }

        } 

           return $this->render('edit', [
                'model' => $model,
                'user'=>$user,
            ]);
        // else {
         
        // }
    }

    public function actionAlarm(){
        return $this->render('alarm');
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

            /**
     * Finds the Ads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelEdit($id)
    {
        if (($model = EditForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}   

?>
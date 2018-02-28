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
            $id = Yii::$app->user->id;

            $user = $this->findModel($id);
            $model =new EditForm;
    
        if ($model->load(Yii::$app->request->post()) ) {
            $model->file = UploadedFile::getInstance($model, 'file');
             

            if(!empty($model->file)){
                
                $model->file->saveAs('image/' . $model->file->baseName . 
                    '.' . $model->file->extension);
                $user->image_name = 'image/' . $model->file->baseName .
                    '.' . $model->file->extension;
            }
            if ($model->validate()) {
                $user->full_name=$model->full_name;
                $user->about_me = $model->about_me;
                $user->save();

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
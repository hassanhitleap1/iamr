<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\controllers\BaseController;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use yii\web\UploadedFile;
use app\components\Device;
use app\models\User;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use Yii\web\cookie;

class SiteController extends BaseController
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $query = User::find()->where(['status' => 10]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count() ,'pageSize'=>12]);
        $users = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
    
        return $this->render('index', [
             'users' => $users,
             'pages' => $pages,
        ]);

        //return $this->render('index', ['users' => $users,'pagination' => $pagination]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionWhy300Doller()
    {
        return $this->render('why-300-doller');
    }


        /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        if (!empty($_GET['ref'])){ Yii::$app->session->set('ref',$_GET['ref']);}
        $model = new SignupForm();
        if (!Yii::$app->user->isGuest) {return $this->redirect(['site/index']);}
        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');

            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                     Device::setDeviceUser();
                    if(Yii::$app->session->has('ref')){
                        $userRef= User::find()->where(['ref'=>Yii::$app->session->get('rel')])->one();
                        if(!empty($userRef)){
                            $referral= new Referral;
                            $referral->user_id=$userRef->id;
                            $referral->user_id_referral=Yii::$app->user->id;
                            $referral->save();     
                        }
                    }
                  
                    return $this->render('payment');
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    public  function actionPayment(){
        return $this->render('payment');
    }

    public function actionView($id){
        $user= $this->findModel($id);
        return $this->render('view',['user'=>$user]);
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

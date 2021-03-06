<?php

namespace app\controllers;

use Yii;
use Yii\web\cookie;
use app\components\Device;
use app\controllers\BaseController;
use app\models\LoginForm;
use app\models\Referral;
use app\models\SignupForm;
use app\models\User;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\Page;
use app\models\Freq;
use app\components\Membership;
use app\components\UserHelper;
use app\models\Contact;
use app\models\ImageConecatUs;
use app\models\Forgot_Password;
use app\models\NewPassword;
use app\models\ForgotPassword;

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
            'pageCache' => [
                'class' => 'yii\filters\PageCache',
                'only' => ['why-get-membership'],
                'duration' => 60,
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT * FROM page  where key_page="page_why"',
                ],
                'variations' => [
                    \Yii::$app->language,
                ]
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
    public function actionWhy100Doller()
    {
        $model= Page::find()->where(['key_page'=> 'page_why'])->one();
        return $this->render('why-100-doller',[
            'model'=> $model,
        ]
        );
    }

        /**
     * Displays about page.
     *
     * @return string
     */
    public function actionWhyGetMembership()
    {
        $model= Page::find()->where(['key_page'=> 'page_why'])->one();
        return $this->render('why-get-membership',[
            'model'=> $model,
        ]
        );
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionMakeMoney()
    {
        $model = Page::find()->where(['key_page' => 'make-money'])->one();
        return $this->render('make-money', [
            'model' => $model,
        ]);
    }
    

        /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $session = Yii::$app->session;
        if (!empty($_GET['ref'])){ 
            $session->set('ref',$_GET['ref']);
        }
       
        $model = new SignupForm();
        
        if (!Yii::$app->user->isGuest) {return $this->redirect(['site/index']);}
        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');

            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                     Device::setDeviceUser();
                     UserHelper::sendEmailValidation();
                    if(Yii::$app->session->has('ref')){
                        $userRef= User::find()->where(['ref'=>Yii::$app->session->get('ref')])->one();
                        Yii::$app->session->remove('ref');
                        if(!empty($userRef)){
                            $referral= new Referral;
                            $referral->user_id=$userRef->id;
                            $referral->user_id_referral=Yii::$app->user->id ;

                           if(!$referral->save()){
                             return $this->render('membership');
                           }     
                        }
                    }
                  
                    return $this->render('membership');
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    public  function actionPayment($id){
        $membership =  new Membership($id);
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/signup']);
        }
        return $this->render('payment',['membership'=> $membership]);
    }
    public function actionMembership()
    {
        return $this->render('membership');
    }
    public function actionView($id){
        $user= $this->findModel($id);
        return $this->render('view',['user'=>$user]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionFreq()
    {   
        $freqs= Freq::find()->all();
        return $this->render('freq',['freqs'=> $freqs]);
    }


        /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionSuccessStory()
    {
        $query = User::find()->where(['status' => 10]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count() ,'pageSize'=>12]);
        $users = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
    
        return $this->render('successs-story', [
             'users' => $users,
             'pages' => $pages,
        ]);

        //return $this->render('index', ['users' => $users,'pagination' => $pagination]);
    }


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post()) ) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            if($model->save()){
                $model->files = UploadedFile::getInstances($model, 'files');
                if ($paths = $model->upload()) {
                // file is uploaded successfully
                    $prime=1;
                   
                    foreach ($paths as $path) {
                        $modeImge = new ImageConecatUs();
                        $modeImge->image_path = $path;
                        $modeImge->prime =$prime;
                        $modeImge->conecat_id = $model->id;
                        $modeImge->save();
                        $prime=0;
                    }
                    return $this->refresh();
                }
                return $this->refresh();
            }
        }

            return $this->render('contact', [
                'model' => $model,
            ]);

    }

    public function actionForgetPassword()
    {
        $model= new Forgot_Password;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('forgot_password', ['model' => $model]);
        }
        return $this->render('forgot_password',['model'=>$model]);
    }

    public function actionNewPassword()
    {
        $model = new NewPassword;
        $session = Yii::$app->session;
        $token=Yii::$app->request->get('token');
        $tokenRow = ForgotPassword::find()
            ->where('validate_code = :token', [':token' => $token])
            ->one();
        if(empty($tokenRow)){
            
            $session->set('error_code',1);
            return $this->render('new-password', ['model' => $model]);
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($tokenRow->validate_code == $token){
                $user = User::findOne($tokenRow->user_id);
                $user->password_hash = Yii::$app->security->generatePasswordHash($model->password);
                $user->save(false);
                $session->set('create_password', 1);
            }
            return $this->render('new-password', ['model' => $model]);
            
        }
        return $this->render('new-password', ['model' => $model]);
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

<?php

namespace app\modules\admin\controllers;


use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

//use frontend\models\PasswordResetRequestForm;
// use frontend\models\ResetPasswordForm;
// use frontend\models\SignupForm;
// use frontend\models\ContactForm;
/**
 * base controller
 */
class BaseController extends Controller
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
                'only' => ['index', 'create', 'update', 'view'],
                'rules' => [
                            // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                            // everything else is denied
                ],
            ],
        ];
    }
  
}

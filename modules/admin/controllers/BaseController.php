<?php

namespace app\modules\admin\controllers;


use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * base controller
 */
class BaseController extends Controller
{



    public function beforeAction($action)
    {
    // your custom code here, if you want the code to run before action filters,
    // which are triggered on the [[EVENT_BEFORE_ACTION]] event, e.g. PageCache or AccessControl

        if (!parent::beforeAction($action)) {
            return false;
        }
        if (Yii::$app->admin->isGuest) {
           if ($action->id != "login"){
                return $this->redirect(['default/login']);
           }
          
        }   
        return true;
    }
  
}

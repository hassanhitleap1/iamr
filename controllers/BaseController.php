<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use Yii\web\cookie;

class BaseController extends Controller
{

	public function beforeAction($action) {
		$cookies = Yii::$app->request->cookies;
	    if ($cookies->has('lang')) {
	        Yii::$app->language = $cookies->getValue('lang');
	    } else {
	        Yii::$app->language = 'en';
	    }
	    return parent::beforeAction($action);
	}


    public function actionLanguage()
        {
             if (Yii::$app->request->isAjax) {
                $data = Yii::$app->request->post();
                Yii::$app->language = $data['lang'];
                $cookie = new Yii\web\cookie([
                'name'=>'lang',
                'value'=>$data['lang']
            ]);
            Yii::$app->getResponse()->getCookies()->add($cookie);
            }
            echo  $data['lang'];
            ;
        }	
}
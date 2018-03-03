<?php

namespace app\modules\admin;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

            /**
         * {@inheritdoc}
         */

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
                'only' => ['login', 'logout'],
                'rules' => [
                            // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],      // everything else is denied
                ],
                'denyCallback' => function () {
                    return Yii::$app->response->redirect(['admin/default/login']);
                },
            ],
        ];
    }
   
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->layout = '@app/modules/admin/views/layouts/main';
        // custom initialization code goes here
    }
}

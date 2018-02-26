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

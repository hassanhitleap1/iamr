<?php

namespace app\models;

use Yii;


/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ForgotPassword extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'forgot_password';
    }


}

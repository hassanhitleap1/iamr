<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;


/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class NewPassword extends Model
{
    public $password;
    public $confPassword;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['password', 'string', 'max' => 255],
            ['confPassword', 'compare', 'compareAttribute' => 'password']
           
        ];
    }




}

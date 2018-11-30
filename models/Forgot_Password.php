<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use app\components\UserHelper;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Forgot_Password extends Model
{
    public $email;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email'], 'required'],
            // password is validated by validateEmail()
            ['email', 'validateEmail'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateEmail($attribute, $params)
    {
        $user = User::find()->where(['email' => $this->email])->one();
    
        if (!$this->hasErrors()) {
            if (empty($user)) {
                $this->addError($attribute, Yii::t('app', 'Eemil_not_found'));
            }else {
                $validateCode = md5(uniqid(rand(), true));
                Yii::$app->db->createCommand()
                    ->insert('forgot_password', [
                        'validate_code' => $validateCode,
                        'user_id' => $user->id,
                    ])->execute();
                $session = Yii::$app->session;
                $session->set('validate_code', $validateCode);
                $session->set('send_email', 1);
              //UserHelper::sendForGetPassword($this->email, $validateCode);
            }

            
        }
    }


}

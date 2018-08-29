<?php
namespace app\models;

use yii\base\Model;
use app\models\User;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;
    public $full_name;
    public $file;
    public $image_name;
    public $confirm_password;
    public $about_me;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['full_name', 'required'],
            ['about_me', 'required'],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute'=>'password'],
            ['file',  'image', 'extensions' => "gif, jpg, png"],

        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        
        if(!empty($this->file)){+
        $image_path='image/' . md5(uniqid(rand(), true))  . '.' . $this->file->baseName ;  
        $this->file->saveAs($image_path);
        $user->image_name=$image_path;
        }else{
        $user->image_name='image/default.jpg';
        }
        
        $user->status=User::STATUS_DELETED;
        $user->full_name = $this->full_name;
        $user->about_me = $this->about_me;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateRef();
        $user->generateAuthKey();
        $user->generateValidationCodeEmail();
        
        return $user->save() ? $user : null;
    }
}
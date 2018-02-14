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
        
        if(!empty($this->file)){
        $this->file->saveAs('image/' . $this->file->baseName . '.' . $this->file->extension);
        $user->image_name='image/' . $this->file->baseName . '.' . $this->file->extension;
        }else{
        $user->image_name='image/defualt.jpg';
        }
        

        $user->full_name = $this->full_name;
        //$user->image_name = $this->image_name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
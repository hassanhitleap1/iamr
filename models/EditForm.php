<?php
namespace app\models;

use yii\base\Model;

/**
 * Signup form
 */
class EditForm extends Model
{

    public $full_name;
    public $file;
    public $image_name;
    public $about_me;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['full_name', 'required'],
            ['about_me', 'required'],
            ['file', 'image', 'extensions' => "gif, jpg, png"],

        ];
    }

}
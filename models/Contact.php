<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property string $image_path
 */
class Contact extends \yii\db\ActiveRecord
{
    public $files;
    public $verifyCode;
    const complete=1;
    const uncomplete=0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['name', 'email', 'subject'], 'string', 'max' => 255],
            [['email'],'email'],
            [['body','name','subject','body','email','files'],'required'],
            [['files'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'subject' => Yii::t('app', 'Subject'),
            'body' => Yii::t('app', 'Body'),
        ];
    }

        /*
    * upload images for post
    */
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->files as $file) {
                $path='contact-image/' . md5(uniqid(rand(), true)) . '.' . $file->extension;
                $file->saveAs($path);
               $paths[]= $path;
            }
            return $paths;
        } else {
            return false;
        }
    }


        /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagesContact()
    {
        return $this->hasMany(ImageConecatUs::className(), ['conecat_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageContact()
    {
        return $this->hasMany(ImageConecatUs::className(), ['conecat_id' => 'id'])->where(['image_conecat_us.prime'=>1])->one();
    }
}

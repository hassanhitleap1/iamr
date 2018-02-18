<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "referral_code".
 *
 * @property integer $id
 * @property string $html_code
 * @property string $js_code
 * @property integer $user_id
 *
 * @property User $user
 */
class ReferralCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'referral_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['html_code', 'js_code', 'user_id'], 'required'],
            [['js_code'], 'string'],
            [['user_id'], 'integer'],
            [['html_code'], 'string', 'max' => 500],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'html_code' => 'Html Code',
            'js_code' => 'Js Code',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

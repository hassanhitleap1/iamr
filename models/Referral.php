<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "referral".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_id_referral
 *
 * @property User $user
 * @property User $userIdReferral
 */
class Referral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'referral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_id_referral'], 'required'],
            [['user_id', 'user_id_referral'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_id_referral'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id_referral' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_id_referral' => 'User Id Referral',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdReferral()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id_referral']);
    }
}

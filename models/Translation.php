<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "translation".
 *
 * @property int $id
 * @property string $payment_id
 * @property int $user_id
 * @property string $hash
 * @property int $completed
 * @property int $membership_id
 *
 * @property User $user
 */
class Translation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id', 'user_id', 'hash', 'completed'], 'required'],
            [['user_id', 'completed', 'membership_id'], 'integer'],
            [['payment_id', 'hash'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_id' => 'Payment ID',
            'user_id' => 'User ID',
            'hash' => 'Hash',
            'completed' => 'Completed',
            'membership_id' => 'Membership ID',
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
     * {@inheritdoc}
     * @return TranslationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TranslationQuery(get_called_class());
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "translation".
 *
 * @property integer $id
 * @property string $payment_id
 * @property integer $user_id
 * @property string $hash
 * @property integer $completed
 *
 * @property User $user
 */
class Translation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'user_id', 'hash', 'completed'], 'required'],
            [['user_id', 'completed'], 'integer'],
            [['payment_id', 'hash'], 'string', 'max' => 200],
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
            'payment_id' => 'Payment ID',
            'user_id' => 'User ID',
            'hash' => 'Hash',
            'completed' => 'Completed',
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

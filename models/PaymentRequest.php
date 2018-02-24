<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_request".
 *
 * @property integer $id
 * @property double $value
 * @property integer $user_id
 * @property string $paypal
 * @property string $western_union_full_name
 * @property string $country
 * @property string $full_address
 * @property integer $accept
 */
class PaymentRequest extends \yii\db\ActiveRecord
{
    const ACCPET_PAYMENT=1;
    const NOT_ACCPET_PAYMENT = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'user_id', 'country', 'full_address', 'accept'], 'required'],
            [['value'], 'number'],
            [['user_id', 'accept'], 'integer'],
            [['paypal'], 'string', 'max' => 50],
            [['western_union_full_name'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 100],
            [['full_address'], 'string', 'max' => 200],
           // ['paypal', 'onOfThem'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function onOfThem($attribute, $params)
    {
        if (!$this->hasErrors()) {

            if (empty($this->paypal) || empty($this->western_union_full_name) ) {
                $this->addError($attribute, 'must be fill paypal or western union full name ');
            }
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'user_id' => 'User ID',
            'paypal' => 'Paypal',
            'western_union_full_name' => 'Western Union Full Name',
            'country' => 'Country',
            'full_address' => 'Full Address',
            'accept' => 'Accept',
        ];
    }
}

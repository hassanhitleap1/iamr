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
            [['value',  'country', 'full_address'], 'required'],
            [['value'], 'number'],
            [['user_id', 'accept'], 'integer'],
            [['paypal'], 'string', 'max' => 50],
            [['western_union_full_name'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 100],
            [['full_address'], 'string', 'max' => 200],
            [['western_union_full_name', 'paypal'], 'my_required'],
            //[['paypal', 'western_union_full_name'], 'onOfThem'],
        ];
    }

    public function my_required($attribute, $params)
    {
    
        if (empty($this->paypal) and empty($this->western_union_full_name)) {
            $this->addError($attribute, "must be fill paypal or western union full name ");
            return false;
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => Yii::t('app','value'),
            'user_id' => Yii::t('app','User_ID'),
            'paypal' => Yii::t('app','Paypal'),
            'western_union_full_name' =>  Yii::t('app', 'Full_Name'),
            'country' =>  Yii::t('app','Country'),
            'full_address' =>  Yii::t('app', 'Full_address'),
            'accept' =>  Yii::t('app','Accept'),
        ];
    }
}

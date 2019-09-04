<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%info_device}}".
 *
 * @property int $id
 * @property string $ip
 * @property string $query
 * @property string $continent
 * @property string $continentCode
 * @property string $country
 * @property string $countryCode
 * @property string $region
 * @property string $regionName
 * @property string $city
 * @property string $zip
 * @property string $lat
 * @property string $lon
 * @property string $timezone
 * @property string $currency
 * @property string $isp
 * @property string $org
 * @property string $as
 * @property string $asname
 * @property string $reverse
 * @property string $mobile
 * @property string $proxy
 * @property int $user_id
 *
 * @property User $user
 */
class InfoDevice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%info_device}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['ip', 'query', 'continent', 'continentCode', 'country', 'countryCode', 'region', 'regionName', 'city', 'zip', 'lat', 'lon', 'timezone', 'currency', 'isp', 'org', 'as', 'asname', 'reverse', 'mobile', 'proxy'], 'string', 'max' => 100],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ip' => Yii::t('app', 'Ip'),
            'query' => Yii::t('app', 'Query'),
            'continent' => Yii::t('app', 'Continent'),
            'continentCode' => Yii::t('app', 'Continent Code'),
            'country' => Yii::t('app', 'Country'),
            'countryCode' => Yii::t('app', 'Country Code'),
            'region' => Yii::t('app', 'Region'),
            'regionName' => Yii::t('app', 'Region Name'),
            'city' => Yii::t('app', 'City'),
            'zip' => Yii::t('app', 'Zip'),
            'lat' => Yii::t('app', 'Lat'),
            'lon' => Yii::t('app', 'Lon'),
            'timezone' => Yii::t('app', 'Timezone'),
            'currency' => Yii::t('app', 'Currency'),
            'isp' => Yii::t('app', 'Isp'),
            'org' => Yii::t('app', 'Org'),
            'as' => Yii::t('app', 'As'),
            'asname' => Yii::t('app', 'Asname'),
            'reverse' => Yii::t('app', 'Reverse'),
            'mobile' => Yii::t('app', 'Mobile'),
            'proxy' => Yii::t('app', 'Proxy'),
            'user_id' => Yii::t('app', 'User ID'),
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
     * @return InfoDeviceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InfoDeviceQuery(get_called_class());
    }

            /**
     * @inheritdoc
     * @return InfoDevice|array|null
     */
    public static function countContry()
    {
       return  (new \yii\db\Query())
        ->select(['country_code', 'COUNT(*) as country_count'])
        ->from('info_device')
        ->groupBy('country_code')
        ->orderBy('COUNT(*) DESC')
        ->limit(6)
        ->all();
    }
}

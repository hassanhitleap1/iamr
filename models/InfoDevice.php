<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info_device".
 *
 * @property string $ip
 * @property string $os
 * @property string $browser
 * @property string $country
 * @property string $country_code
 * @property string $region
 * @property string $region_name
 * @property string $city
 * @property string $lat
 * @property string $lon
 * @property string $timezone
 * @property string $isp
 * @property string $org
 * @property string $as
 * @property integer $user_id
 *
 * @property User $user
 */
class InfoDevice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info_device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip',  'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['ip', 'os', 'browser', 'country_code', 'region', 'region_name', 'city', 'lat', 'lon', 'timezone', 'isp', 'org'], 'string', 'max' => 50],
            [['country'], 'string', 'max' => 150],
            [['as'], 'string', 'max' => 100],
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
            'ip' => 'Ip',
            'os' => 'Os',
            'browser' => 'Browser',
            'country' => 'Country',
            'country_code' => 'Country Code',
            'region' => 'Region',
            'region_name' => 'Region Name',
            'city' => 'City',
            'lat' => 'Lat',
            'lon' => 'Lon',
            'timezone' => 'Timezone',
            'isp' => 'Isp',
            'org' => 'Org',
            'as' => 'As',
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

    /**
     * @inheritdoc
     * @return InfoDeviceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InfoDeviceQuery(get_called_class());
    }
}

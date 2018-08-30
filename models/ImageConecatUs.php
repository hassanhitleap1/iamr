<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image_conecat_us".
 *
 * @property int $id
 * @property string $image_path
 * @property int $prime
 * @property int $conecat_id
 *
 * @property Contact $conecat
 */
class ImageConecatUs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image_conecat_us';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prime', 'conecat_id'], 'integer'],
            [['image_path'], 'string', 'max' => 255],
            [['conecat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::className(), 'targetAttribute' => ['conecat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image_path' => Yii::t('app', 'Image Path'),
            'prime' => Yii::t('app', 'Prime'),
            'conecat_id' => Yii::t('app', 'Conecat ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConecat()
    {
        return $this->hasOne(Contact::className(), ['id' => 'conecat_id']);
    }

    /**
     * {@inheritdoc}
     * @return ImageConecatUsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImageConecatUsQuery(get_called_class());
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "memberships".
 *
 * @property int $id
 * @property string $name_en
 * @property string $name_ar
 * @property string $name_it
 * @property string $name_fr
 * @property string $name_de
 * @property int $features_en
 * @property int $features_ar
 * @property int $features_de
 * @property string $features_fr
 * @property string $features_it
 * @property string $created_at
 * @property string $updated_at
 */
class Memberships extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'memberships';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_en', 'name_ar', 'name_it', 'name_fr', 'name_de', 'features_en', 'features_ar', 'features_de', 'features_fr', 'features_it', 'created_at', 'updated_at'], 'required'],
            [['features_en', 'features_ar', 'features_de'], 'integer'],
            [['features_fr', 'features_it'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_en', 'name_ar', 'name_it', 'name_fr', 'name_de'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_en' => 'Name En',
            'name_ar' => 'Name Ar',
            'name_it' => 'Name It',
            'name_fr' => 'Name Fr',
            'name_de' => 'Name De',
            'features_en' => 'Features En',
            'features_ar' => 'Features Ar',
            'features_de' => 'Features De',
            'features_fr' => 'Features Fr',
            'features_it' => 'Features It',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MembershipsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MembershipsQuery(get_called_class());
    }
}

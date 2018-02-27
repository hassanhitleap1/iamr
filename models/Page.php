<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $title_en
 * @property string $title_de
 * @property string $title_fr
 * @property string $title_it
 * @property string $title_ar
 * @property string $description_en
 * @property string $description_de
 * @property string $description_fr
 * @property string $description_it
 * @property string $description_ar
 * @property string $key_page
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_en', 'title_de', 'title_fr', 'title_it', 'title_ar', 'description_en', 'description_de', 'description_fr', 'description_it', 'description_ar', 'key_page'], 'required'],
            [['description_en', 'description_de', 'description_fr', 'description_it', 'description_ar'], 'string'],
            [['title_en', 'title_de', 'title_fr', 'title_it', 'title_ar'], 'string', 'max' => 265],
            [['key_page'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_en' => 'Title En',
            'title_de' => 'Title De',
            'title_fr' => 'Title Fr',
            'title_it' => 'Title It',
            'title_ar' => 'Title Ar',
            'description_en' => 'Description En',
            'description_de' => 'Description De',
            'description_fr' => 'Description Fr',
            'description_it' => 'Description It',
            'description_ar' => 'Description Ar',
            'key_page' => 'Key Page',
        ];
    }
}

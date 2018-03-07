<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%freq}}".
 *
 * @property integer $id
 * @property string $id_html
 * @property string $prg_en
 * @property string $prg_de
 * @property string $prg_it
 * @property string $prg_ar
 * @property string $prg_fr
 * @property string $collapse_en
 * @property string $collapse_it
 * @property string $collapse_de
 * @property string $collapse_fr
 * @property string $collapse_ar
 */
class Freq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%freq}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_html', 'prg_en', 'prg_de', 'prg_it', 'prg_ar', 'prg_fr', 'collapse_en', 'collapse_it', 'collapse_de', 'collapse_fr', 'collapse_ar'], 'required'],
            [['collapse_en', 'collapse_it', 'collapse_de', 'collapse_fr', 'collapse_ar'], 'string'],
            [['id_html'], 'string', 'max' => 60],
            [['prg_en', 'prg_de', 'prg_it', 'prg_ar', 'prg_fr'], 'string', 'max' => 300],
            [['id_html'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_html' => Yii::t('app', 'Id Html'),
            'prg_en' => Yii::t('app', 'Prg En'),
            'prg_de' => Yii::t('app', 'Prg De'),
            'prg_it' => Yii::t('app', 'Prg It'),
            'prg_ar' => Yii::t('app', 'Prg Ar'),
            'prg_fr' => Yii::t('app', 'Prg Fr'),
            'collapse_en' => Yii::t('app', 'Collapse En'),
            'collapse_it' => Yii::t('app', 'Collapse It'),
            'collapse_de' => Yii::t('app', 'Collapse De'),
            'collapse_fr' => Yii::t('app', 'Collapse Fr'),
            'collapse_ar' => Yii::t('app', 'Collapse Ar'),
        ];
    }

    /**
     * @inheritdoc
     * @return FreqQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FreqQuery(get_called_class());
    }
}

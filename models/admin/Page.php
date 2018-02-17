<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $tite
 * @property integer $disc
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
            [['tite', 'disc', 'key_page'], 'required'],
            [['disc'], 'integer'],
            [['tite'], 'string', 'max' => 300],
            [['key_page'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tite' => 'Tite',
            'disc' => 'Disc',
            'key_page' => 'Key Page',
        ];
    }
}

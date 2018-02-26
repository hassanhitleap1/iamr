<?php

namespace app\models;

use yii\db\Query;

/**
 * This is the ActiveQuery class for [[InfoDevice]].
 *
 * @see InfoDevice
 */
class InfoDeviceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InfoDevice[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InfoDevice|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }



}

<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Memberships]].
 *
 * @see Memberships
 */
class MembershipsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Memberships[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Memberships|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

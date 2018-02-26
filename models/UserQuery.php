<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[User]].
 *
 * @see User
 */
class UserQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['status' => User::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     * @return User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    /**
     * @inheritdoc
     * @return User[]|array
     */
    public function disActive()
    {
        return $this->andWhere(['status'=>User::STATUS_DELETED]);
    }

   public function countContryDisActiveUser()
    {
        $query = $this->andWhere(['status'=>User::STATUS_DELETED]);
        $query->joinWith('infoDevice');
        return $query ;
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

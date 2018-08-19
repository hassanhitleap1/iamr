<?php

use yii\db\Migration;

/**
 * Handles the creation of table `referral`.
 */
class m180819_071935_create_referral_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('referral', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(11),
            'user_id_referral'=>$this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('referral');
    }
}

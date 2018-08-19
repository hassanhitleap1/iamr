<?php

use yii\db\Migration;

/**
 * Handles the creation of table `balance`.
 */
class m180819_071347_create_balance_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('balance', [
            'id' => $this->primaryKey(),
            'balance'=>$this->float()->notNull(),
            'user_id'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('balance');
    }
}

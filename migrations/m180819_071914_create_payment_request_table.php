<?php

use yii\db\Migration;

/**
 * Handles the creation of table `payment_request`.
 */
class m180819_071914_create_payment_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('payment_request', [
            'id' => $this->primaryKey(),
            'value'=>$this->float(),
            'user_id'=>$this->integer(11)->notNull()->unique(),
            'paypal'=>$this->string(50),
            'western_union_full_name'=>$this->string(255),
            'country'=>$this->string(100),
            'full_address'=>$this->string(200),
            'create_at'=>$this->date(),
            'accept'=> 'tinyint(3)',
        ],$tableOptions);
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-payment_request-user_id',
            'payment_request',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('payment_request');
    }
}

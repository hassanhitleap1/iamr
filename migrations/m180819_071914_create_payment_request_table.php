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
        $this->createTable('payment_request', [
            'id' => $this->primaryKey(),
            'value'=>$this->float(),
            'user_id'=>$this->integer(11),
            'paypal'=>$this->string(50),
            'western_union_full_name'=>$this->string(255),
            'country'=>$this->string(100),
            'full_address'=>$this->string(200),
            'create_at'=>$this->date(),
            'accept'=> 'tinyint(3)',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('payment_request');
    }
}

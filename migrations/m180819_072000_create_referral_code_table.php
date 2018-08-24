<?php

use yii\db\Migration;

/**
 * Handles the creation of table `referral_code`.
 */
class m180819_072000_create_referral_code_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('referral_code', [
            'id' => $this->primaryKey(),
            'html_code'=>$this->string(600),
            'js_code'=>$this->text(),
            'user_id'=>$this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('referral_code');
    }
}

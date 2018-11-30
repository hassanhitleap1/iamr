<?php

use yii\db\Migration;

/**
 * Class m181127_220133_forgot_password
 */
class m181127_220133_forgot_password extends Migration
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
        $this->createTable('{{%forgot_password}}', [
            'id' => $this->primaryKey(),
            'validate_code'=>$this->string(),
            'user_id' => $this->integer(11),
        ], $tableOptions);


        $this->addForeignKey(
            'fk-forgot-password-user_id',
            'forgot_password',
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
        $this->dropTable('forgot_password');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181127_220133_forgot_password cannot be reverted.\n";

        return false;
    }
    */
}

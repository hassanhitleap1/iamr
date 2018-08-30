<?php

use yii\db\Migration;

/**
 * Handles the creation of table `conect`.
 */
class m180829_135456_create_conect_table extends Migration
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
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'email'=>$this->string(),
            'subject'=>$this->string(),
            'body'=>$this->text(),
            'complete'=>$this->smallInteger()->notNull()->defaultValue(0),
        
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('conect');
    }
}

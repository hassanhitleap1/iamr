<?php

use yii\db\Migration;

/**
 * Handles the creation of table `translation`.
 */
class m180819_072020_create_translation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('translation', [
            'id' => $this->primaryKey(),
            'payment_id'=>$this->string(200),
            'user_id'=>$this->integer(11),
            'hash'=>$this->string(200),
            'completed'=> 'tinyint(4)',
            'membership_id'=> 'tinyint(4) DEFAULT 0',

        ]);
                        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-translation-user_id',
            'translation',
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
        $this->dropTable('translation');
    }
}

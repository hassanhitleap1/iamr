<?php

use yii\db\Migration;

/**
 * Class m180830_093005_create_image_conecat_us
 */
class m180830_093005_create_image_conecat_us extends Migration
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
        $this->createTable('image_conecat_us', [
            'id' => $this->primaryKey(),
            'image_path'=>$this->string(),
            'prime'=> $this->smallInteger()->notNull()->defaultValue(2),
            'conecat_id'=>$this->integer(),
        
        ],$tableOptions);

        $this->addForeignKey(
            'fk-conecat-conecat_id',
            'image_conecat_us',
            'conecat_id',
            'contact',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180830_093005_create_image_conecat_us cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180830_093005_create_image_conecat_us cannot be reverted.\n";

        return false;
    }
    */
}

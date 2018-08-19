<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m180819_071852_create_page_table extends Migration
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
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'title_en' => $this->string(300),
            'title_de' => $this->string(300),
            'title_fr' => $this->string(300),
            'title_it' => $this->string(300),
            'title_ar' => $this->string(300),
            'description_en' => $this->text(),
            'description_de' => $this->text(),
            'description_fr' => $this->text(),
            'description_it' => $this->text(),
            'description_ar' => $this->text(),
            'key_page' => $this->string(300),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page');
    }
}

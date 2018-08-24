<?php

use yii\db\Migration;

/**
 * Handles the creation of table `freq`.
 */
class m180819_071805_create_freq_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('freq', [
            'id' => $this->primaryKey(),
            'id_html' => $this->string(60),
            'prg_en' => $this->string(300),
            'prg_de' => $this->string(300),
            'prg_it' => $this->string(300),
            'prg_ar' => $this->string(300),
            'prg_fr' => $this->string(300),
            'collapse_en' => $this->text(),
            'collapse_it' => $this->text(),
            'collapse_de' => $this->text(),
            'collapse_fr' => $this->text(),
            'collapse_ar' => $this->text(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('freq');
    }
}

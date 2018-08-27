<?php

use yii\db\Migration;

/**
 * Handles the creation of table `info_device`.
 */
class m180819_071827_create_info_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('info_device', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(50),
            'os' => $this->string(50),
            'browser' => $this->string(50),
            'country' => $this->string(50),
            'country_code' => $this->string(50),
            'region' => $this->string(50),
            'region_name' => $this->string(50),
            'city' => $this->string(50),
            'lat' => $this->string(50),
            'lon' => $this->string(50),
            'timezone' => $this->string(50),
            'isp' => $this->string(50),
            'org' => $this->string(50),
            'as' => $this->string(50),
            'user_id' => $this->integer(11)->notNull()->unique(),
        ]);
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-info_device-user_id',
            'info_device',
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
        $this->dropTable('info_device');
    }
}

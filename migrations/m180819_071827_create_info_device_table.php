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
            'ip' => $this->string(100),
            'query' => $this->string(100),
            'continent' => $this->string(100),
            'continentCode' => $this->string(100),
            'country' => $this->string(100),
            'countryCode' => $this->string(100),
            'region' => $this->string(100),
            'regionName' => $this->string(100),
            'city' => $this->string(100),
            'countryCode' => $this->string(100),
            'zip' => $this->string(100),
            'lat' => $this->string(100),
            'lon' => $this->string(100),
            'timezone' => $this->string(100),
            'currency' => $this->string(100),
            'isp' => $this->string(100),
            'org' => $this->string(100),
            'as' => $this->string(100),
            'asname' => $this->string(100),
            'reverse' => $this->string(100),
            'mobile' => $this->string(100),
            'proxy' => $this->string(100),
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

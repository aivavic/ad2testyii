<?php

use yii\db\Migration;
use yii\db\Schema;
class m160422_035842_adspaces extends Migration
{
    public function up()
    {

//        CREATE TABLE `ADSPACES` (
//    `adspase_id` int(11) NOT NULL AUTO_INCREMENT,
//`ownedApp_id` int(11) unsigned NOT NULL,
//`type` enum('banner','video','native') NOT NULL DEFAULT 'banner',
//`width` int(11) unsigned NOT NULL,
//`hight` int(11) unsigned NOT NULL,
//`refreshTime` int(11) unsigned NOT NULL DEFAULT '30',
//`clickType` enum('inapp','external') NOT NULL DEFAULT 'inapp',
//PRIMARY KEY (`adspase_id`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%adspaces}}', [
            'id' => Schema::TYPE_PK,
            'ownedApp_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'type' => 'enum(\'banner\',\'video\',\'native\') NOT NULL DEFAULT \'banner\'',
            'width' => Schema::TYPE_INTEGER . '(11) unsigned NOT NULL',
            'hight' => Schema::TYPE_INTEGER . '(11) unsigned NOT NULL',
            'refreshTime' => Schema::TYPE_INTEGER . '(11) unsigned NOT NULL DEFAULT \'30\'',
            'clickType' => 'enum(\'inapp\',\'external\') NOT NULL DEFAULT \'inapp\'',


        ], $tableOptions);
        $this->insert('{{%adspaces}}', [
            'id'=>1,
            'ownedApp_id' => '1',
            'type' => 'banner',
            'width' => '100',
            'hight' => '100',
            'refreshTime' =>'30',
            'clickType' => 'inapp',
        ]);

//        if ($this->db->driverName === 'mysql') {
//            $this->addForeignKey('fk_ownedApp', '{{%adspaces}}', 'ownedApp_id', '{{%applications}}', 'id', 'cascade', 'cascade');
//        }

    }

    public function down()
    {
        if ($this->db->driverName === 'mysql') {
            $this->dropForeignKey('fk_ownerApp', '{{%adspaces}}');
        }

        $this->dropTable('{{%adspaces}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

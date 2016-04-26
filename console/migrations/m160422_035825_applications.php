<?php

use yii\db\Migration;
use yii\db\Schema;
class m160422_035825_applications extends Migration
{
    public function up()
    {
//        `app_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
//`app_key` char(36) NOT NULL COMMENT 'GUID',
//`owner_id` int(11) NOT NULL,
//`appName` varchar(100) NOT NULL,
//`platform` enum('ios','android') NOT NULL,
//`store_url` varchar(2048) NOT NULL,
//`status`
//enum('new','sandbox','pendingApproval','active','inactive','deleted') NOT NULL DEFAULT 'new',
//        `approved` enum('false','true') NOT NULL DEFAULT 'false',
//PRIMARY KEY (`app_id`),
//UNIQUE KEY `APP_KEY` (`APP_KEY`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%applications}}', [
            'id' => Schema::TYPE_PK,
            'app_key' => 'char(36) NOT NULL',
            'owner_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'appName' => Schema::TYPE_STRING . '(100) NOT NULL',
            'platform' => 'enum(\'ios\',\'android\') NOT NULL',
            'store_url' => Schema::TYPE_STRING . '(2048) NOT NULL',
            'status' => 'enum(\'new\',\'sandbox\',\'pendingApproval\',\'active\',\'inactive\',\'deleted\') NOT NULL DEFAULT \'new\'',
            'approved' => 'enum(\'false\',\'true\') NOT NULL DEFAULT \'false\'',
            'UNIQUE KEY `APP_KEY` (`APP_KEY`)',



        ], $tableOptions);
        $this->insert('{{%applications}}', [
            'id'=>1,
            'app_key' => Yii::$app->getSecurity()->generateRandomString(),
            'owner_id' => '1',
            'appName' => 'Application',
            'platform' => 'android',
            'store_url' => 'url',
            'status' => 'new',

        ]);

        if ($this->db->driverName === 'mysql') {
            $this->addForeignKey('fk_owner', '{{%applications}}', 'owner_id', '{{%user}}', 'id', 'cascade', 'cascade');
        }
    }

    public function down()
    {
        if ($this->db->driverName === 'mysql') {
            $this->dropForeignKey('fk_owner', '{{%applications}}');
        }

        $this->dropTable('{{%applications}}');
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

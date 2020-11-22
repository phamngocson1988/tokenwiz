<?php

use yii\db\Migration;

/**
 * Class m201121_152657_wallet
 */
class m201121_152657_wallet extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%wallet}}', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull()->defaultValue(0),
            'currency' => $this->string(16)->notNull()->defaultValue('VND'),
            'ref_obj' => $this->string(16), 
            'ref_key' => $this->string(16), 
            'description' => $this->string(512), 
            'created_by' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->integer(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk-wallet-user',
            'wallet',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createTable('{{%withdrawal_request}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer(),
            'done_at' => $this->dateTime(), 
            'done_by' => $this->integer(),
            'description' => $this->string(512),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),// 0 means it's requesting
        ]);

        $this->addForeignKey(
            'fk-withdrawal_request-user',
            'withdrawal_request',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-wallet-user', 'wallet');
        $this->dropForeignKey('fk-withdrawal_request-user', 'withdrawal_request');
        $this->dropTable('{{%wallet}}');
        $this->dropTable('{{%withdrawal_request}}');
    }
}

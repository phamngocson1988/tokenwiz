<?php

use yii\db\Migration;

/**
 * Class m201114_075930_order
 */
class m201114_075930_order extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull()->defaultValue(0),
            'total_price' => $this->integer()->notNull(),
            'currency' => $this->string(16)->defaultValue('VND'),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'confirmed_at' => $this->dateTime(),
            'started_at' => $this->dateTime(),
            'last_benefit_at' => $this->dateTime(),
            'stopped_at' => $this->dateTime(),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer(),
            'updated_at' => $this->dateTime(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-order-product',
            'order',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-order-user',
            'order',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-order-product', 'order');
        $this->dropForeignKey('fk-order-user', 'order');

        $this->dropTable('{{%order}}');

    }
}

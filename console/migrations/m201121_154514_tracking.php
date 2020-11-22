<?php

use yii\db\Migration;

/**
 * Class m201121_154514_tracking
 */
class m201121_154514_tracking extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tracking}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text(), 
            'created_by' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->integer(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%tracking}}');
    }
}

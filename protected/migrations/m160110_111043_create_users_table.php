<?php

use yii\db\Schema;
use yii\db\Migration;

class m160110_111043_create_users_table extends Migration
{
    public function up()
    {
        $this->createTable('User', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'active' => $this->integer()->notNull()->defaultValue('1'),
        ]);
    }

    public function down()
    {
        echo "m160110_111043_create_users_table cannot be reverted.\n";

        return false;
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

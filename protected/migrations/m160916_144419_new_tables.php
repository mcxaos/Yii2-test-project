<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\Role;

class m160916_144419_new_tables extends Migration
{
    public function up()
    {
        if (!in_array('Users', $this->getDb()->schema->tableNames)) {$this->CreateUsers();};
        if (!in_array('Roles', $this->getDb()->schema->tableNames)) {$this->CreateRoles();};
        if (!in_array('UserRole', $this->getDb()->schema->tableNames)) {$this->CreateUserRole();};
    }

    public function down()
    {
        echo "m160916_144419_new_tables cannot be reverted.\n";

        return false;
    }   

    private function CreateUsers()
    {
        $this->createTable('Users', [
                'id' => $this->primaryKey(),
                'username' => $this->string()->notNull()->unique(),
                'email' => $this->string()->notNull()->unique(),
                'password' => $this->string()->notNull(),
                'auth_key' => $this->string()->notNull(),
                'password_reset_token' => $this->string(),
                'active' => $this->integer()->notNull()->defaultValue('1'),
            ]);
    }

    private function CreateRoles()
    {

        $this->createTable('Roles', [
            'id' => $this->primaryKey(),
            'role' => $this->string()->notNull()->unique(),
            'level'=>$this->integer()->notNull()->defaultValue(role::ROLE_USER),
        ]);
    }

    private function CreateUserRole()
    {

        $this->createTable('UserRole', [
            'user_id' => $this->integer()->notNull(),
            'role_id'=>$this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-role-user_id',
            'UserRole',
            'user_id',
            'Users',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-role-role_id',
            'UserRole',
            'role_id',
            'Roles',
            'id',
            'CASCADE'
        );
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

<?php

use yii\db\Migration;
use app\models\Role;



class m160207_112348_add_new_field_to_user extends Migration
{

    private $tableName = 'Roles';
    public function up()
    {
        if (!in_array($this->tableName, $this->getDb()->schema->tableNames)) {
            $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'role' => $this->string()->notNull(),
            'primery'=>$this->integer()->notNull()->defaultValue(role::ROLE_USER),
            ]);
        }
        $this->addDefaultRoles();
    }
    private function addDefaultRoles()
    {
        foreach(Role::getRoleList() as $role){
            if(Role::findByRole($role)) === null){

            }
        }
    }

    public function down()
    {
        return false;
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\User;

class m160110_111043_create_users_table extends Migration
{
    private $tableName = 'Users';

    public function up()
    {
        if (!in_array($this->tableName, $this->getDb()->schema->tableNames)) {
            $this->createTable($this->tableName, [
                'id' => $this->primaryKey(),
                'username' => $this->string()->notNull(),
                'email' => $this->string()->notNull(),
                'password' => $this->string()->notNull(),
                'auth_key' => $this->string()->notNull(),
                'password_reset_token' => $this->string(),
                'active' => $this->integer()->notNull()->defaultValue('1'),
            ]);
        }
        $this->addDefaultUsers();
    }
    private function addDefaultUsers()
    {
        $defaultUsers=[
            'administrator'=>['username'=>'administrator','email' =>'admin@admin.com','Password'=>'12345678',],
            'moderator'=>['username'=>'moderator','email'=>'moderator@moderator.com','Password'=>'12345678',],
        ];
        foreach($defaultUsers as $user){
            if(User::findByUsername($user['username']) === null){
                $newUser=new user();
                $newUser->username = $user['username'];
                $newUser->email = $user['email'];
                $newUser->setPassword($user['Password']);
                $newUser->generateAuthKey();
                if($newUser->validate()){
                    $newUser->save();
                }
            }
        }
    }

    public function down()
    {
        echo "m160110_111043_create_users_table cannot be reverted.\n";

        return false;
    }
}

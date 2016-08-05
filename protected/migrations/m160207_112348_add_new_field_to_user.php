<?php

use yii\db\Migration;
use app\models\user;



class m160207_112348_add_new_field_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('{{%User}}', 'role', $this->integer(2)->defaultValue(User::ROLE_USER));
        $this->addDefaultUsers();
    }

    public function down()
    {
        $this->dropColumn('{{%User}}', 'field');
    }
    private function addDefaultUsers()
    {
        $defaultUsers=[
            'administrator'=>['username'=>'administrator','email' =>'admin@admin.com','Password'=>'12345678',
                'role'=>User::ROLE_ADMINISTRATOR],
            'moderator'=>['username'=>'moderator','email'=>'moderator@moderator.com','Password'=>'12345678',
                'role'=>User::ROLE_MODERATOR],
        ];
        foreach($defaultUsers as $user){
            if(User::findByUsername($user['username']) === null){
                $newUser=new user();
                $newUser->username = $user['username'];
                $newUser->email = $user['email'];
                $newUser->role=$user['role'];
                $newUser->setPassword($user['Password']);
                $newUser->generateAuthKey();
                if($newUser->validate()){
                    $newUser->save();
                }
            }
        }
    }
}

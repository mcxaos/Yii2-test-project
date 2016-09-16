<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\User;
use app\models\UserRole;
use app\models\Role;

class m160916_151159_add_admin extends Migration
{
    public function up()
    {
        $defaultUsers=[
            'administrator'=>['username'=>'admin','email' =>'admin@admin.com',
            'Password'=>'12345678', 'role'=>Role::ROLE_ADMINISTRATOR],
        ];
           foreach (Role::getRoleLabel() as $key => $value) {
           if(Role::findByRole($value) === null){
                $newRole=new Role();
                $newRole->role=$value;
                $newRole->level=$key;
                if($newRole->validate()){
                    $newRole->save();
                }
            }
        }
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
                if(UserRole::findRole($newUser->getId()) === null)
                {
                    $newRole=new UserRole();

                    $role= Role::getRoleLabel();
                    $role=$role[$user['role']];

                    $newRole->user_id=$newUser->getId();
                    $newRole->role_id= (Role::findByRole($role)->getId());
                    if($newRole->validate()){
                    $newRole->save();
                    }
                }
            }
        }
    }

    

    public function down()
    {
        echo "m160916_151159_add_admin cannot be reverted.\n";

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

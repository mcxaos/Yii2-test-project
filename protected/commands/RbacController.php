<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\rbac\UserRole;
use app\models\User;

class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;

        // Create roles
        $guest  = $authManager->createRole('guest');
        $admin  = $authManager->createRole(User::ROLE_ADMINISTRATOR);
        $moderator  = $authManager->createRole(User::ROLE_MODERATOR);
        $user  = $authManager->createRole(User::ROLE_USER);

        // Create simple, based on action{$NAME} permissions
        $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $signUp = $authManager->createPermission('sign-up');
        $index  = $authManager->createPermission('index');
        $view   = $authManager->createPermission('view');


        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($signUp);
        $authManager->add($index);
        $authManager->add($view);

        // Add rule, based on UserExt->group === $user->group
        $UserRole= new UserRole();
        $authManager->add( $UserRole);

        // Add rule "UserGroupRule" in roles
        $guest->ruleName      =  $UserRole->name;
        $moderator->ruleName  =  $UserRole->name;
        $user->ruleName       =  $UserRole->name;
        $admin->ruleName      =  $UserRole->name;

        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($user);
        $authManager->add($moderator);
        $authManager->add($admin);

        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
        $authManager->addChild($guest, $index);
        $authManager->addChild($guest, $signUp);
        $authManager->addChild($guest, $view);

        // user
        $authManager->addChild($user, $guest);

        // moderator
        $authManager->addChild($moderator, $user);

        // Admin
        $authManager->addChild($admin, $moderator);
    }
}
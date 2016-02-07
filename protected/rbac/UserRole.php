<?php
namespace app\rbac;

use Yii;
use yii\rbac\Rule;
use app\models\user;

class UserRole extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!\Yii::$app->user->isGuest) {
            $role = \Yii::$app->user->identity->role;
            if ($item->name ===  user::ROLE_ADMINISTRATOR) {
                return $role ==   user::ROLE_ADMINISTRATOR;
            } elseif ($item->name ===  user::ROLE_MODERATOR) {
                return $role == user::ROLE_MODERATOR|| $role ==   user::ROLE_ADMINISTRATOR;
            } elseif ($item->name === user::ROLE_USER) {
                return  $role ==  user::ROLE_MODERATOR|| $role ==   user::ROLE_ADMINISTRATOR || $role == user::ROLE_USER ;
            }
        }
        return true;
    }
}
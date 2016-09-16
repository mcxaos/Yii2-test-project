<?php
namespace app\models;

use yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\data\ActiveDataProvider;

class UserRole extends ActiveRecord 

{

    /**
     * @return string название таблицы, сопоставленной с этим ActiveRecord-классом.
     */
    public static function tableName()
    {
        return 'UserRole';
    }


    public static function findRole($id)
    {
        return static::findOne(['user_id' => $id]);
    }


    public static function findUsers($role)
    {
        return static::findOne(['role_id' => $role]);
    }

    public  function getUserId()
    {
        return $this->user_id;
    }

    public  function getRoleId()
    {
        return $this->role_id;
    }
    

}
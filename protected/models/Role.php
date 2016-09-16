<?php
namespace app\models;

use yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\data\ActiveDataProvider;

class Role extends ActiveRecord 

{
    const ROLE_USER =0;
    const ROLE_MODERATOR = 1;
    const ROLE_ADMINISTRATOR = 2;

    /**
     * @return string название таблицы, сопоставленной с этим ActiveRecord-классом.
     */
    public static function tableName()
    {
        return 'Roles';
    }


    /**
     * @return array
     */
    public static function getRoleList()
    {
        return [
            self::ROLE_USER,
            self::ROLE_ADMINISTRATOR,
            self::ROLE_MODERATOR,
        ];
    }

    /**
     * @return array
     */
    public function getRoleLabel()
    {
         return [
            self::ROLE_USER => 'User',
            self::ROLE_ADMINISTRATOR => 'Administrator',
            self::ROLE_MODERATOR => 'Moderator',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    /**
     * Finds role by id
     *
     * @param  int      $id
     * @return static|null
     */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds user by nanme
     *
     * @param  string      $role
     * @return static|null
     */

    public static function findByRole($role)
    {
        return static::findOne(['role' => $role]);
    }

    public function relations()
    {
        return array(
           'UserRoles'=>array(self::BELONGS_TO, 'User',
                'UserRole(role_id, user_id)'),
        );
        
    }

}
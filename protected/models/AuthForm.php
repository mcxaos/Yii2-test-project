<?php

namespace app\models;

use yii\base\Model;

class AuthForm extends Model
{

    public $login;
    public $email;
    public $password;
    public $id;
    public $active;

    public function rules()
    {
        return [
            [['login' ,'password','email'], 'required'],
            [['login', 'email'], 'trim'],
            [['login', 'password'],  'match', 'pattern' => '/^[a-z]\w*$/i'],
            [['login', ],  'string', 'length' => [4, 24],],
            [['password', ],  'string', 'length' => [8, ],],
            ['email', 'email'],
        ];
    }
}
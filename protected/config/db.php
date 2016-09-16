<?php
/*
 mysql
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=web',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
*/
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=yiitest',
    'username'=>'root',
    'password'=>'root',
    'charset'=>'UTF8',
];
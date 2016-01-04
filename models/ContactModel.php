<?php
namespace app\models;

use yii\base\Model;

class ContactModel extends Model
{
    public $name;

    public function attributeLabels()
    {
        return [
            'name' => 'My site name'
        ];
    }
}
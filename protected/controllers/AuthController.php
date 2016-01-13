<?php
namespace app\controllers;

use app\models\AuthForm;
use Yii;

class AuthController extends MainController
{
    public function actionIndex()
    {
        $model = new AuthForm();
        $post=Yii::$app->request->post();
        if($model->load($post)){
            if($post['submit']==='Login'){
               $user=$model->login();
            }elseif($post['submit']==='Signup'){
                $user=$model->signup();
            }
            if(!$user){
                return $this->render('index', ['model' => $model]);
            }
        }else
        {
            return $this->render('index', ['model' => $model]);
        }
    }
}
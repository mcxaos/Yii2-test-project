<?php
namespace app\controllers;

use app\models\AuthForm;
use Yii;

class AuthController extends MainController
{
    public function actionIndex()
    {
        if($this->identity)
        {
            return $this->redirect('/profile');
        }
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
            }else{
                return $this->redirect('/profile');
            }
        }else
        {
            return $this->render('index', ['model' => $model]);
        }
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        $this->identity=null;
        return $this->redirect('/profile');
    }
}
<?php
namespace app\controllers;
use Yii;

class ProfileController extends MainController
{

    public function actionIndex($id=null)
    {
        if($this->identity==null && $id==null){
           $this->redirect('/auth');
        }
        return $this->render('index', []);
    }
}

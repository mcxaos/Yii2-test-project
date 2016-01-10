<?php
namespace app\controllers;

use app\models\AuthForm;

class AuthController extends MainController
{

    public function actionIndex()
    {
        $model = new AuthForm();
        return $this->render('index', ['model' => $model]);
    }
}

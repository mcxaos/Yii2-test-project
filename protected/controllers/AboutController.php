<?php
namespace app\controllers;

use Yii;

class AboutController extends MainController
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}

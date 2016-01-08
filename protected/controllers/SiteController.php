<?php
namespace app\controllers;

use Yii;


class SiteController extends MainController
{

    public function actionIndex()
    {
      //Yii::$app->mycompoonent->welcome();
        $name=Yii::$app->name;
        return $this->render('index', [
            'name' => $name,
        ]);
    }
}

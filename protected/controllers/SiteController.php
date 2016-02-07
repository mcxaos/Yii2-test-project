<?php
namespace app\controllers;

use Yii;


class SiteController extends MainController
{
    public function actionIndex()
    {
        $name=Yii::$app->name;
        return $this->render('index', [
            'name' => $name,
        ]);
    }
}

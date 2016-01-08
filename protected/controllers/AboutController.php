<?php
namespace app\controllers;

use Yii;

class AboutController extends MainController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    /*
     * http://web.local/about/hello?id=123
     */
    public function actionHello($id='0')
    {
        echo $id;
        Yii::$app->mycomponent->welcome();
    }
}

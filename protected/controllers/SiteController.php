<?php
namespace app\controllers;

use Yii;
use app\models\User;

class SiteController extends MainController
{
    public function actionIndex()
    {
        $name=Yii::$app->name;

        return $this->render('index', [
            'name' => $name,
        ]);
    }
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            Yii::$app->response->statusCode=$exception->statusCode;
            return $this->render('error', ['exception' => $exception]);
        }
    }
    public function actionTest($id=0)
    {
        $this->identity->getRole();    
         

    }
}

<?php
namespace app\controllers;

use Yii;
use app\models\ContactModel;

class SiteController extends MainController
{

    public function actionIndex()
    {
      //Yii::$app->mycompoonent->welcome();
        $model = new ContactModel();
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}

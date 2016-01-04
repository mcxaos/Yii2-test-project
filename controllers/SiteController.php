<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ContactModel;

class SiteController extends Controller
{


    public function actionIndex()
    {
        $model = new ContactModel();

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}

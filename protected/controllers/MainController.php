<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class MainController extends Controller
{
    protected $identity;
    public function init()
    {
        $this->identity=Yii::$app->user->identity;
        parent::init(); // Call parent implementation;
    }

    public function render($view, $params = [])
    {
        $this->view->params['identity']=$this->identity;
        return parent::render($view,$params);
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (!\Yii::$app->user->can($action->id)) {
               throw new ForbiddenHttpException('Access denied');
            }
            return true;
        } else {
            return false;
        }
    }
}

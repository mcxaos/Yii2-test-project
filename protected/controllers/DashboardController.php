<?php
namespace app\controllers;

use app\models\User;
use app\models\Role;
use Yii;
use yii\data\ActiveDataProvider;
class DashboardController  extends MainController
{
    private $role;
    public function init()
    {

        parent::init(); // Call parent implementation;
        $this->role = $this->identity->getRoleLevel();
        if ( !in_array($this->role,[Role::ROLE_ADMINISTRATOR,Role::ROLE_MODERATOR])) {
            throw new \yii\web\HttpException(404,'Page not found');
        }
    }
    public function actionIndex()
    {
            $searchModel= new User;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index',['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel]);

    }

    public function actionViev($id=0)
    {
        echo $id;
    }   

}

<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>

    <div class="container text-center">
        <span class="pull-left">&copy;  <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></span>
        <span class="">
            <?= Html::a('About us', Url::toRoute(['/about',])); ?></span>
        <span class="pull-right"><?= Yii::powered() ?></span>
    </div>



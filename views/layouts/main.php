<?php
/* @var $this yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="<?= Yii::$app->charset ?>">
            <?= Html::csrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
        </head>
        <body class="main-body">
            <?php $this->beginBody() ?>
            <header>хедер</header>
            <?= $content ?>
            <footer>футер</footer>
            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage() ?>
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
    <link rel="shortcut icon" href="/public/img/favicon.ico" type="image/x-icon" />
    <?php $this->head() ?>
</head>

<body class="main-body">
    <?php $this->beginBody() ?>
        <header class="header"><?= $this->render('pageHeader') ?></header>
        <div class="main-content"><?= $content ?></div>
        <footer class="footer">  <?= $this->render('pageFooter') ?></footer>
    <?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>
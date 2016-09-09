<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$identity=$this->params['identity'];
?>
<?php
if($identity!=null && in_array($identity->role,[\app\models\user::ROLE_ADMINISTRATOR,\app\models\user::ROLE_MODERATOR])){
    $dashboard=true;
}else{
    $dashboard=false;
}
?>
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">
                            <img src="/public/img/star_6307.png" width="18">
                            <?= Html::encode(Yii::$app->name)?>
                        </a>
                    </li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($identity===null): ?>
                        <li><?= Html::a('Login', Url::toRoute(['/auth',])); ?></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><?= Html::a('Messages', Url::toRoute(['/messages',])); ?></li>
                                <li><?= Html::a('Auctions', Url::toRoute(['/auctions',])); ?></li>
                                <?php  if ($dashboard): ?>
                                    <li role="separator" class="divider"></li>
                                    <li><?= Html::a('Dashboard', Url::toRoute(['/dashboard',])); ?></li>
                                <?php endif; ?>
                                <li role="separator" class="divider"></li>
                                <li><?= Html::a('Edit profile', Url::toRoute(['/profile',])); ?></li>
                                <li role="separator" class="divider"></li>
                                <li><?= Html::a('Logout', Url::toRoute(['/auth/logout',])); ?></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
</nav>
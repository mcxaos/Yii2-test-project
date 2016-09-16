<?php
use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\grid\GridView;
$this->title = 'Dashboard';
?>
<div class="text-center dashboard-users">
    <H2>Dashboard</H2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username:ntext',
            'email:Email',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>

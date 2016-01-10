<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title='Log in';
?>

<div class="userform text-center">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->input('password') ?>
    <div class="form-group">
        <?= Html::submitButton('Log in', ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Sign up', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

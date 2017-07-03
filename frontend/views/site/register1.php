<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Register';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box login-panel panel panel-default">
    <div class="panel-heading">
        <center><h4>Registrasi</h4></center>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body"><br />
<!--        <p class="login-box-msg">Sign in to start your session</p>-->

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?=
                $form
                ->field($model, 'username', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')])
        ?>

        <?=
        $form->field($model, 'password')->widget(PasswordInput::classname(), []);
        ?>
        <?=
                $form
                ->field($model, 'email', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('email')])
        ?>
        <?=
                $form
                ->field($model, 'captcha', $fieldOptions1)
                ->label(false)
                ->widget(Captcha::className())
        ?>
        <div class="row">

            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <!-- /.social-auth-links -->



    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

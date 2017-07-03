<?php

use yii\captcha\Captcha;
use kartik\password\PasswordInput;
$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-primary" style="position:relative; left:230px;">
            <div class="panel-heading"><center><h3><?= Html::encode($this->title) ?></h3>
                    <b><i><p>*Please fill out the following fields to register:</p></b></i></center></div>
            <div class="panel-body"> 
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'username') ?>
                <?=
                $form->field($model, 'password')->widget(PasswordInput::classname(), [
                    'pluginOptions' => [
                        'showMeter' => true,
                        'toggleMask' => false
                    ],]);
                ?>
                <?= $form->field($model, 'captcha')->widget(Captcha::className()) ?>
                <div class="form-group">
                    <?= Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                <p>Please fill out the following fields to register:</p>
                <?php ActiveForm::end(); ?>

            </div>
        </div> 
        <div class="site-signup">

        </div>
    </div>
</div>
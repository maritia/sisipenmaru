<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\password\PasswordInput;

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">

    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <p>
                <p>Please fill out the following fields to change password :</p>                 </p>
            </div>
            <div class="box-body">
                <?php
                $form = ActiveForm::begin([
                            'id' => 'changepassword-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-5\">
                        {input}</div>\n<div class=\"col-lg-5\">
                        {error}</div>",
                                'labelOptions' => ['class' => 'col-lg-2 control-label'],
                            ],
                ]);
                ?>
                <?=
                $form->field($model, 'oldpass', ['inputOptions' => [
                        'placeholder' => 'Old Password'
            ]])->passwordInput()
                ?>
                <?=
                $form->field($model, 'newpass')->widget(PasswordInput::classname(), []);
                ?>     

                <?=
                $form->field($model, 'repeatnewpass', ['inputOptions' => [
                        'placeholder' => 'Repeat New Password'
            ]])->passwordInput()
                ?>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-11">
                        <?=
                        Html::submitButton('Change password', [
                            'class' => 'btn btn-primary'
                        ])
                        ?>
                        <br><br><br>
                        <br><br><br>
                        <br><br><br>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
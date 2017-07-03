<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'kode Verifikasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    
    <p>Silahkan masukkan kode verifikasi yang sudah di kirimkan ke email anda.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'verification-form']); ?>

                <?= $form->field($model, 'verification_code') ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

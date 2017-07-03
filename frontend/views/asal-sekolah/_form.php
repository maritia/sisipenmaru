<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AsalSekolah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asal-sekolah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_sekolah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

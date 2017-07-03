<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pembayaran-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?php //$form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'foto')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? ' Upload' : ' Update', ['class' => $model->isNewRecord ? 'btn btn-success fa fa-upload' : 'btn btn-primary fa fa-upload']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

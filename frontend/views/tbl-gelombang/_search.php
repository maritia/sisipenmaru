<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblGelombangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-gelombang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_gelombang') ?>

    <?= $form->field($model, 'tanggal_awal') ?>

    <?= $form->field($model, 'tanggal_akhir') ?>

    <?= $form->field($model, 'judul') ?>

   
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblOrtuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-ortu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ortu') ?>

    <?= $form->field($model, 'id_cama') ?>

    <?= $form->field($model, 'nm_ayah') ?>

    <?= $form->field($model, 'nm_ibu') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'kd_pos') ?>

    <?php // echo $form->field($model, 'pk_ayah') ?>

    <?php // echo $form->field($model, 'pk_ibu') ?>

    <?php // echo $form->field($model, 'gaji_ayah') ?>

    <?php // echo $form->field($model, 'gaji_ibu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

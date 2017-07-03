<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCamaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-cama-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cama') ?>

    <?= $form->field($model, 'id_sekolah') ?>

    <?= $form->field($model, 'id_account') ?>

    <?= $form->field($model, 'tmp_lahir') ?>

    <?= $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'bln_lahir') ?>

    <?php // echo $form->field($model, 'thn_tamat') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'kd_pos') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'id_gelombang') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'kelulusan') ?>

    <?php // echo $form->field($model, 'no_pendaftaran') ?>

    <?php // echo $form->field($model, 'tgl_daftar') ?>

    <?php // echo $form->field($model, 'thn_lahir') ?>

    <?php // echo $form->field($model, 'jk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblOrtu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-ortu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pk_ayah')->dropDownList([''=>'','Pegawai Negeri Sipil'=>'Pegawai Negeri Sipil','Guru'=>'Guru','Wiraswasta'=>'Wiraswasta','TNI\POLRI'=>'TNI\POLRI','Karyawan Swasta'=>'Karyawan Swasta','Lainnya'=>'Lainnya']) ?>

    <?= $form->field($model, 'pk_ibu')->dropDownList([''=>'','Pegawai Negeri Sipil'=>'Pegawai Negeri Sipil','Guru'=>'Guru','Wiraswasta'=>'Wiraswasta','TNI\POLRI'=>'TNI\POLRI','Karyawan Swasta'=>'Karyawan Swasta','Lainnya'=>'Lainnya']) ?>

    <?= $form->field($model, 'gaji_ayah')->textInput() ?>

    <?= $form->field($model, 'gaji_ibu')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

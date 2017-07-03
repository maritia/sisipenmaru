<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\TblGelombang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-gelombang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->dropDownList([''=>'','Pendaftaran Gelombang 1'=>'Pendaftaran Gelombang 1','Pendaftaran Gelombang 2'=>'Pendaftaran Gelombang 2','Pendaftaran Gelombang 3'=>'Pendaftaran Gelombang 3',]) ?>

    <b>Atur Tanggal</b>
    <?=
    DatePicker::widget([
        'model' => $model,
        'attribute' => 'tanggal_awal',
        'attribute2' => 'tanggal_akhir',
        'options' => ['placeholder' => 'Start date'],
        'options2' => ['placeholder' => 'End date'],
        'type' => DatePicker::TYPE_RANGE,
        'form' => $form,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]);
    ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

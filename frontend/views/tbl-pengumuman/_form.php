<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPengumuman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pengumuman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
    <?=
    DatePicker::widget([
        'model' => $model,
        'attribute' => 'tgl_berakhir',
        'options' => ['placeholder' => 'End date'],
        //'type' => DatePicker::TYPE_RANGE,
        'form' => $form,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]);
    ?>
    <br>
    <?=
    $form->field($model, 'deskripsi')->widget(\yii\redactor\widgets\Redactor::className(), [
        'clientOptions' => [
            'imageUpload' => \yii\helpers\Url::to(['/redactor/upload/image']),
            'fileUpload' => ['/redactor/upload/file'],
        ],
            ]
    )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

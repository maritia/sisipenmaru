<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPengumumanSearch */
/* @var $form yii\widgets\ActiveForm */
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='fa fa-search form-control-feedback'></span>"
];
?>

<div class="tbl-pengumuman-search">
    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <div class="col-lg-12">
        <br>   <?=
                $form
                ->field($model, 'judul', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('judul')])
        ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>

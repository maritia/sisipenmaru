<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCama */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tbl-cama-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jk')->radioList(['Laki-Laki' => 'Laki-Laki', 'Wanita' => ' Perempuan']); ?>

    <?= $form->field($model, 'tmp_lahir')->textInput(['maxlength' => true]) ?>
    <b>Tangggal Lahir</b>  <small><font  color="red">umur maksimal 40 tahun</font> </small>
    <br><br>    <div class="col-lg-12">
        <div class="col-lg-4">
            <?= $form->field($model, 'thn_lahir')->dropDownList($model->getYearsList()); ?>
        </div>
        <div class="col-lg-4">
            <?=
            $form->field($model, 'bln_lahir')->dropDownList(['1' => 'Januari', '2' => 'Februari',
                '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' => 'September',
                '10' => 'Oktober', '11' => 'November', '12' => 'Desember'], ['prompt' => '---Bulan---']);
            ?>
        </div>
        <div class="col-lg-4">
            <?=
            $form->field($model, 'tgl_lahir')->dropDownList(['' => '',
                '1' => '1', '2' => '2', '3' => '3', '4' => '4',
                '5' => '5', '6' => '6', '7' => '7', '8' => '8',
                '9' => '9', '10' => '10', '11' => '11', '12' => '11',
                '13' => '13', '14' => '14', '15' => '15', '16' => '16',
                '17' => '17', '18' => '18', '19' => '19', '20' => '20',
                '21' => '21', '22' => '22', '23' => '23', '24' => '24',
                '25' => '25', '26' => '26', '27' => '27', '28' => '28',
                '29' => '29', '30' => '30',
                '13' => '31',
                    ], ['prompt' => '---Tanggal---']);
            ?>
        </div>
    </div>





    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_sekolah')->dropDownList([$items]) ?>
    <?=
    Html::a('Tambahkan Sekolah', [
        'asal-sekolah/create',], [
        'class' => 'btn btn-primary',
        'data' => [
            'message' => 'Book Returned?',
        //'method' => 'post',
        ],]
    )
    ?>

    <?= $form->field($model, 'thn_tamat')->dropDownList([$model->getYearsList1()]); ?>
    <small><font  color="red">Maksimal sudah 20 tahun tamat</font> </small>
    <?= $form->field($model, 'agama')->dropDownList(['kristen protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'islam' => 'Islam', 'hindu' => 'Hindu', 'buddha' => 'Buddha', 'kong hu cu' => 'Kong Hu Cu'], ['prompt' => '---Agama---']) ?>

    <?= $form->field($model, 'kd_pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'foto')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*']
    ]);
    ?>

    <p><b><font color="red">Ukuran foto 3 X 4</font></b></p>


    <?= Html::submitButton($model->isNewRecord ? 'Daftar' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>

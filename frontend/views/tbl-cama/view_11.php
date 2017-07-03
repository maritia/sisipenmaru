<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCama */

$this->title = $model->id_cama;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Camas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cama-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cama], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cama], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cama',
            'id_sekolah',
            'id_account',
            'tmp_lahir',
            'tgl_lahir',
            'bln_lahir',
            'thn_tamat',
            'agama',
            'kd_pos',
            'no_hp',
            'foto',
            'nama',
            'id_gelombang',
            'alamat',
            'kelulusan',
            'no_pendaftaran',
            'tgl_daftar',
            'thn_lahir',
            'jk',
        ],
    ]) ?>

</div>

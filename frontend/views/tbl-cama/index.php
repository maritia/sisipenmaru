<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblCamaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Camas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cama-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Cama', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cama',
            'id_sekolah',
            'id_account',
            'tmp_lahir',
            'tgl_lahir',
            // 'bln_lahir',
            // 'thn_tamat',
            // 'agama',
            // 'kd_pos',
            // 'no_hp',
            // 'foto',
            // 'nama',
            // 'id_gelombang',
            // 'alamat',
            // 'kelulusan',
            // 'no_pendaftaran',
            // 'tgl_daftar',
            // 'thn_lahir',
            // 'jk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

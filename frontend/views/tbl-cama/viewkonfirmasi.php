<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblCamaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Konfirmasi Kelulusan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cama-index">


    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <p>
                    </p>
                </div>
                <div class="box-body">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'no_pendaftaran',
                            'nama',
                            // 'alamat',
                            //'tmp_lahir',
                            //'tgl_lahir',
                            // 'jk',
                            [
                                'label' => 'Asal Sekolah',
                                'format' => 'raw',
                                'value' => function($data) {
                                    $cama = \frontend\models\AsalSekolah::find()->where(['id' => $data->id_sekolah])->one();
                                    return '<div>' . $cama->nama_sekolah . '</div>';
                                }
                                    ],
                                    // 'thn_tamat',
                                    // 'agama',
                                    // 'kd_pos',
                                    // 'no_tlp',
                                    // 'no_hp',
                                    //   'kelulusan',
                                    // 'id_ortu',
                                    // 'id_jurusan',
                                    // 'id_account',
                                    // 'id_pembayaran',
                                    // 'foto',
                                    [
                                        'label' => 'Action',
                                        'format' => 'raw',
                                        'value' => function($data) {
                                            return '<div>' . Html::a(' Lulus', [ 'tbl-cama/approve', 'id' => $data->id_cama,], [
                                                        'class' => 'btn btn-primary fa fa-check',
                                                        'data' => [
                                                            'confirm' => 'Anda yakin  Calon Mahasiswa dengan No Pendaftaran ' . $data->no_pendaftaran . ' Lulus?',
                                                            'method' => 'post',
                                                        ],]
                                                    )
                                                    . ' ' . Html::a(' Tidak Lulus', [
                                                        'tbl-cama/reject', 'page' => 'expired', 'id' => $data->id_cama,], [
                                                        'class' => 'btn btn-danger fa fa-close',
                                                        'data' => [
                                                            'confirm' => 'Anda yakin  Calon Mahasiswa dengan No Pendaftaran ' . $data->no_pendaftaran . ' Tidak Lulus?',
                                                            'method' => 'post',
                                                        ],]
                                                    ) . '</div>';
                                        }
                                            ],
                                        //['class' => 'yii\grid\ActionColumn'],
                                        ],
                                    ]);
                                    ?>

                </div> 
            </div> 
        </div> </div> 
</div>

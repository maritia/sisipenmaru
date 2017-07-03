<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\TblCama;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Konfirmasi Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .modal-header, h4, .close {
        background-color: #666699;
        color:white !important;
        text-align: center;
        font-size: 30px;
    }
    .modal-footer {
        background-color: #f9f9f9;
    }
</style>

<div class="tbl-pembayaran-index">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">

                </div>
                <div class="box-body">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                           / 'id_pembayaran',
                            //   'foto',
                            [
                                'label' => 'Nomor Pendaftaran',
                                'format' => 'raw',
                                'value' => function($data) {
                                    $cama = TblCama::find()->where(['id_cama' => $data->id_cama])->one();
                                    return '<div>' . $cama->no_pendaftaran . '</div>';
                                }
                                    ],
                                    [
                                        'label' => 'Action',
                                        'format' => 'raw',
                                        'value' => function($data) {
                                             $cama = TblCama::find()->where(['id_cama' => $data->id_cama])->one();
                               
                                            $cama = TblCama::find()->where(['id_cama' => $data->id_cama])->one();
                                            return '<div>' . Html::a(' Konfirmasi', [
                                                        'tbl-pembayaran/aprove', 'id' => $data->id_pembayaran], [
                                                        'class' => 'btn btn-primary fa fa-check',
                                                        'data' => [
                                                            'confirm' => 'Anda yakin  Calon Mahasiswa dengan No Pendaftaran ' . $cama->no_pendaftaran . ' anda konfirmasi?',
                                                            'method' => 'post',
                                                        ],
                                                            ]
                                                    )
                                                    .' '. Html::a(' Tolak', [
                                                        'tbl-pembayaran/reject', 'id' => $data->id_pembayaran,], [
                                                        'class' => 'btn btn-danger fa fa-close',
                                                        'data' => [
                                                            'confirm' => 'Anda yakin  Calon Mahasiswa dengan No Pendaftaran ' . $cama->no_pendaftaran . ' anda tolak?',
                                                            'method' => 'post',
                                                        ],]
                                                    ). ' 
                                                        

  <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">'.$cama->no_pendaftaran.'</h4>
                            </div>
                            <div class="modal-body">
                                <p> <img src="../../buktipembayaran/' . $data->foto .'" width="90%"/> </p>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>

                    </div>
                </div>

                        <button type="button" class="btn btn-info fa fa-search" data-toggle="modal" data-target="#myModal"></button>
                    ' . '</div>';
                                        }
                                            ],
                                        ],
                                    ]);
                                    ?>
                </div>   

            </div> 



        </div>
    </div> 
</div> 

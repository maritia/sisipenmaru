<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblGelombangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengumuman';
$this->params['breadcrumbs'][] = 'Pengumuman';
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
<div class="tbl-gelombang-index">

    <div class="row">
        <div class="col-xs-12">
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tambah Pengumuman</h4>
                        </div>
                        <div class="modal-body">
                            <p><?php
                                echo $this->render('_form', [
                                    'model' => $model,
                                ]);
                                ?></p>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>

                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <p>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Pengumuman</button>
                    </p>
                </div>
                <div class="box-body">

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            //          ['class' => 'yii\grid\SerialColumn'],
                            //   'id_pengumuman',
                            //    'judul',
                            //   'deskripsi',
                            //   'lampiran',
                            [
                                'format' => 'raw',
                                'value' => function($model) {
                                    return '<div>' . Html::a($model->judul, [
                                                'tbl-pengumuman/view', 'id' => $model->id_pengumuman,], [
                                                    ]
                                            )
                                            . '</div>';
                                }
                                    ],
                                //['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]);
                            ?>

                </div>
            </div>
        </div>
    </div>
</div>

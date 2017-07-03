<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran Gagal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pembayaran-index">


    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                </div>
                <div class="box-body">

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //'id_pembayaran',
                            //   'foto',
                            [
                                'label' => 'Nomor Pendaftaran',
                                'format' => 'raw',
                                'value' => function($data) {
                                    $cama = \frontend\models\TblCama::find()->where(['id_cama' => $data->id_cama])->one();
                                    return '<div>' . $cama->no_pendaftaran . '</div>';
                                }
                                    ], [
                                        'label' => 'Nama',
                                        'format' => 'raw',
                                        'value' => function($data) {
                                            $cama = \frontend\models\TblCama::find()->where(['id_cama' => $data->id_cama])->one();
                                            return '<div>' . $cama->nama . '</div>';
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

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Kalender Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            // 'id',
                            'judul',
                            'deskripsi',
                            'tanggal_awal',
                            'tanggal_akhir',
                            [
                                'label' => 'Action',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return '<div>' . Html::a('Update', [ 'event/update', 'id' => $data->id,], [
                                                'class' => 'btn btn-primary',
                                                'data' => [ 'message' => 'Book Returned?',
                                                //'method' => 'post',
                                                ],]
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

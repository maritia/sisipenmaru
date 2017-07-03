<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Kalender Kegiatan';

//$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => 'Create Event', 'url' => ['create']];
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
<div class="event-index">
    <div class="row">
        <div class="col-xs-12">

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tambah Jadwal</h4>
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
            <div class="box box-danger">
                <div class="box-header">
                    <p>
                        <?= Html::a('Update Jadwal Kegiatan', ['updateall'], ['class' => 'btn btn-success']) ?>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Jadwal Kegiatan</button>

                    </p>
                </div>
                <div class="box-body">

                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

                    <?=
                    \yii2fullcalendar\yii2fullcalendar::widget(array(
                        'events' => $events,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

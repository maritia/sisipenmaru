<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Event */

$this->title = 'Update '.$model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Kalender kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Kegiatan', 'url' => ['updateall']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-update">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                    ])
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

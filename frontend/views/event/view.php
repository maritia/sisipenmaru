<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Event */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Kalender kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Kegiatan', 'url' => ['updateall']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

   
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php 
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //      'id',
            'judul',
            'deskripsi',
            'tanggal_awal',
            'tanggal_akhir',
        ],
    ])
    ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPengumuman */

$this->title = 'Tambahkan Pengumuman '. $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;?>
<div class="tbl-pengumuman-create">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

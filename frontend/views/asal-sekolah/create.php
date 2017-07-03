<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\AsalSekolah */

$this->title = 'Asal Sekolah';
$this->params['breadcrumbs'][] = ['label' => 'Daftar', 'url' => ['tbl-cama/create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asal-sekolah-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

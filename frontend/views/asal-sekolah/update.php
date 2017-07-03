<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AsalSekolah */

$this->title = 'Update Asal Sekolah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Asal Sekolahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asal-sekolah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblGelombang */

$this->title = 'Update ' . $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Kelola Pendaftaran', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_gelombang, 'url' => ['view', 'id' => $model->id_gelombang]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-gelombang-update">

    <div class="box box-group">
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

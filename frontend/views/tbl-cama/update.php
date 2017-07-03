<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCama */

$this->title = 'Update Data Diri';
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view','id'=>$model->id_cama]];
$this->params['breadcrumbs'][] = 'Update ';
?>
<div class="row">
    <div class="tbl-cama-update">

        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <font class="fa fa-user"></font><h3 class="box-title ">Data Pribadi Sesuai Izajah</h3>
                </div>
                <div class="box-body">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                        'items' => $items,
                    ])
                    ?>

                </div>

            </div>
        </div>

    </div>
</div>
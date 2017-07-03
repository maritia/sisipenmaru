<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCama */

$this->title = 'Daftar';
//$this->params['breadcrumbs'][] = ['label' => 'Tbl Camas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="tbl-cama-create">

        <div class="col-md-12">
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
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblGelombang */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Kelola Pendaftaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-gelombang-view">


    <div class="box box-group">
        <div class="box-header">
            <p>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id_gelombang], ['class' => 'btn btn-primary']) ?>
            </p>    </p>
        </div>
        <div class="box-body">

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //  'id_gelombang',
                    'tanggal_awal',
                    'tanggal_akhir',
                    'judul',
                ],
            ])
            ?>

        </div>
    </div>
</div>

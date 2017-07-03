<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPengumuman */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row body box-primary">
    <div class="col-lg-12">
        <div class="col-lg-9 box box-primary">
            <div class="col-lg-12 box-header with-border">
                <?php if (Yii::$app->user->can('akademik')) {
                    ?>
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id_pengumuman], ['class' => 'btn btn-primary']) ?>

                    </p>
                <?php }
                ?>

                <h4> <?= $model->judul ?> </h4>

            </div>
            <?= $model->deskripsi ?>

        </div>
    </div>
</div>


<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPengumumanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengumuman';
$this->params['breadcrumbs'][] = 'Pengumuman';
?>
<div class="row body box-primary">
    <div class="col-lg-12">
        <div class="col-lg-9 box box-primary">
            <div class="box-header with-bor   der">
                <div class="col-lg-12">
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                
            </div>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    //          ['class' => 'yii\grid\SerialColumn'],
                    //   'id_pengumuman',
                    //    'judul',
                    //   'deskripsi',
                    //   'lampiran',
                    [
                        'format' => 'raw',
                        'value' => function($model) {
                            return '<div>' . Html::a($model->judul, [
                                        'tbl-pengumuman/view', 'id' => $model->id_pengumuman,], [
                                            ]
                                    )
                                    . '</div>';
                        }
                            ],
                        //     ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>

        </div>
    </div>
</div>

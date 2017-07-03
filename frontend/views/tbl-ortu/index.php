<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblOrtuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Ortus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-ortu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Ortu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ortu',
            'id_cama',
            'nm_ayah',
            'nm_ibu',
            'alamat',
            // 'kd_pos',
            // 'pk_ayah',
            // 'pk_ibu',
            // 'gaji_ayah',
            // 'gaji_ibu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

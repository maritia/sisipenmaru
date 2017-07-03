<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AsalSekolahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asal Sekolahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asal-sekolah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asal Sekolah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama_sekolah',
            'alamat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

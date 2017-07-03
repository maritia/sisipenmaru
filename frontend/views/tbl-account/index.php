<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Account', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_account',
            'username',
            'password',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

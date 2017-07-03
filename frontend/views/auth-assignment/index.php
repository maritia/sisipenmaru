<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ubah Hak Akses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo yii\bootstrap\Html::img('@web/uploads/Maritia.JPG');?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'item_name',
            //'user_id',
            //  'created_at',
            [
                'label' => 'Username',
                'format' => 'raw',
                'value' => function($data) {
                    $account = frontend\models\TblAccount::find()->where(['id_account' => $data->user_id])->one();
                    return '<div>'.$account->username.'</div>';
                }
                    ], [
                        'label' => '',
                        'format' => 'raw',
                        'value' => function($data) {
                            return '<div>'
                                    . Html::a('Ubah Hak Akses', [
                                        'auth-assignment/update', 'page' => 'expired', 'item_name' => $data->item_name, 'user_id' => $data->user_id,], [
                                        'class' => 'btn btn-primary',
                                        'data' => [
                                            'message' => 'Book Returned?',
                                        //'method' => 'post',
                                        ],]
                                    ) . '</div>';
                        }
                            ],
                        //    ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>

</div>

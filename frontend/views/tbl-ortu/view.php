<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\TblCama;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCama */

$this->title = "Data Orangtua";
if (!Yii::$app->user->isGuest) {
    $cama = frontend\models\TblCama::find()->where(['id_account' => Yii::$app->user->id])->one();
    $this->params['breadcrumbs'][] = ['label' => $cama->nama, 'url' => ['tbl-cama/view', 'id' => $cama->id_cama]];
}
$this->params['breadcrumbs'][] = $this->title;
$cama = TblCama::find()->where(['id_account' => Yii::$app->user->id])->one();
?>
<div class="row">
    <div class="col-md-10">

        <div class="panel panel-primary"> 
            <div class="panel-heading"> <h3 class="panel-title">
                    <div class="col-lg-7">Data Orangtua <?= Html::encode($cama->nama) ?> </div>
                    <div class="col-lg-offset-10"><?= Html::a(' Update', ['update', 'id' => $model->id_ortu], ['class' => 'glyphicon glyphicon-pencil']) ?></div>

                </h3> </div> 
            <div class="panel-body">
                <div class="col-md-12">

                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //   'id_ortu',
                            'nm_ayah',
                            'nm_ibu',
                            'alamat',
                            'kd_pos',
                            'pk_ayah',
                            'pk_ibu',
                            'gaji_ayah',
                            'gaji_ibu',
                        ],
                    ])
                    ?>

                </div>
                <div class="col-md-4">

                </div>
            </div> 
        </div>
    </div>



</div>


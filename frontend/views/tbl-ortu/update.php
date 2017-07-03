<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblOrtu */

$this->title = 'Update Data Orangtua';
if (!Yii::$app->user->isGuest) {
    $cama = frontend\models\TblCama::find()->where(['id_account' => Yii::$app->user->id])->one();
    $this->params['breadcrumbs'][] = ['label' => $cama->nama, 'url' => ['tbl-cama/view', 'id' => $cama->id_cama]];
}
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="tbl-ortu-update">

        <div class="col-md-10">
            <div class="box box-info">
                <div class="box-header with-border">
                    <font class="fa fa-users    "></font><h3 class="box-title">Data Orangtua</h3>
                </div>
                <div class="box-body">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                    ])
                    ?>

                </div>

            </div>
        </div>

    </div>
</div>


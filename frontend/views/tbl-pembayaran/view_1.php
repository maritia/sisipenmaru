<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPembayaran */

$cama = frontend\models\TblCama::find()->where(['id_cama'=>$model->id_cama])->one();


$this->title = $cama->no_pendaftaran;
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Biaya Pendaftaran', 'url' => ['back','id'=>$model->id_pembayaran]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pembayaran-view">


    <p>
        <?= Html::a('Back', ['back', 'id' => $model->id_pembayaran], ['class' => 'btn btn-info']) ?>

    </p>
    <img src="<?= "../../buktipembayaran/" . $model->foto ?>" width="600"/>

</div>

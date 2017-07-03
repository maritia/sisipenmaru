<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPembayaran */

$this->title = 'Update Bukti Pembayaran ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pembayaran-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

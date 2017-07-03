<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblAccount */

$this->title = 'Update Tbl Account: ' . ' ' . $model->id_account;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_account, 'url' => ['view', 'id' => $model->id_account]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-account-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

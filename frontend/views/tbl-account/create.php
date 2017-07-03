<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TblAccount */

$this->title = 'Create Tbl Account';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-account-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

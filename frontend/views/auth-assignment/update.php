<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */

$this->title = 'Ubah Hak Akses' . ' ' . $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'Ubah Hak Akses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Notification */

$this->title = 'Update Notification: ' . $model->id_notif;
$this->params['breadcrumbs'][] = ['label' => 'Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_notif, 'url' => ['view', 'id' => $model->id_notif]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notification-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

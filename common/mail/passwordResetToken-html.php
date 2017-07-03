<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/login2', 'id' => $model->id_account]);
//$model = \frontend\models\TblAccount::find()->where(['id_account' => Yii::$app->user->id])->one();
?>
<div class="password-reset">

    <p>Silahkan klik link berikut untuk melakukan verifikasi :</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
    <p>Atau Masukkan kode verifikasi berikut </p>

    <p><?= $model->verification_code ?></p>



</div>

<?php
/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/login']);
//$model = \frontend\models\TblAccount::find()->where(['id_account' => Yii::$app->user->id])->one();
?>

Silahkan klik link berikut untuk melakukan verifikasi :
<?= $resetLink ?>

Atau Masukkan kode verifikasi berikut 
<?= $model->verification_code ?>


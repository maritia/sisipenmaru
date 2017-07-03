<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\TblCama;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblAccount */

$this->title = "";
$this->params['breadcrumbs'][] = ['label' => 'Profil'];
//$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

$cama = frontend\models\TblAccount::find()->where(['id_account' => Yii::$app->user->id])->one();
?>

<div class="tbl-account-view">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="col-lg-8">
                        <p>
                            <?= Html::a('Change Password', ['site/changepassword'], ['class' => 'btn btn-success']) ?> <br><br><br>
                        </p>
                    </div>



                </div>
                <div class="box-body">

                    <p>

                    </p><div class="col-lg-4">
                        <img src="../../fotoprofil/avatar3.png" class="user-image"/>

                    </div>
                    <div class="col-lg-8">
                        <?=
                        DetailView::widget([
                            'model' => $cama,
                            'attributes' => [
                                'username',
                                'email',
                            ],
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

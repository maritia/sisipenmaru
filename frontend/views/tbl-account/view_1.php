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

$cama = TblCama::find()->where(['id_account' => $model->id_account])->one();
?>

<div class="tbl-account-view">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <p>
                        <?= Html::a('Change Password', ['site/changepassword'], ['class' => 'btn btn-success']) ?> <br><br><br>
                    </p>
                </div>
                <div class="box-body">

                    <p>

                    </p><div class="col-lg-4">
                        <?php if ($cama->foto == NULL) { ?>
                            <img src="../../fotoprofil/avatar3.png" class="user-image"/>

                        <?php } else {
                            ?>
                            <img src = "<?= "../../fotoprofil/" . $model->id_account . '.jpg' ?>" width="300" class = "user-image" />

                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-8">
                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'nama',
                                'alamat',
                                'tgl_lahir',
                                'jk',
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

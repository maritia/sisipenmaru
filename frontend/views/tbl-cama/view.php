<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\TblOrtu;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCama */

$this->title = $model->nama;
//$this->params['breadcrumbs'][] = ['label' => 'Tbl Camas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$ortu = TblOrtu::find()->where(['id_cama' => $model->id_cama])->one();
?>
<div class="row">
    <div class="col-md-10">

        <div class="panel panel-primary"> 
            <div class="panel-heading"> <h3 class="panel-title">
                    <div class="col-lg-4"><?= Html::encode($this->title) ?> </div>
                    <div class="col-lg-offset-10"><?= Html::a(' Update', ['update', 'id' => $model->id_cama], ['class' => 'glyphicon glyphicon-edit']) ?></div>

                </h3> </div> 
            <div class="panel-body">
                <div class="col-md-8">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //    'id_cama',
                            'nama',
                            'alamat',
                            'tmp_lahir',
                            'tgl_lahir',
                            'jk',
                            'id_sekolah',
                            'thn_tamat',
                            'agama',
                            'kd_pos',
                            //                'foto',
                            'no_hp',
//            'id_ortu',
//            'id_jurusan',
//            'id_account',
//            'id_pembayaran',
                        ],
                    ])
                    ?>



                </div>
                <div class="col-md-4">
                    <img src="<?= "../../fotoprofil/" . $model->id_account . '.jpg' ?>" class="user-image img-thumbnail" height="500px" width="200px"  alt="User Image"/>
                    <p class="h3">NPD: <?= $model->no_pendaftaran ?></p>
                </div>
                <div class="col-md-12">

                    <?php if (empty($ortu)) { ?>
                        <?= Html::a(' Isi Data Orangtua', ['tbl-ortu/create'], ['class' => 'btn btn-success fa fa-users']) ?>
                    <?php } else { ?>
                        <?= Html::a(' Data Orangtua', ['tbl-ortu/update', 'id' => $ortu->id_ortu], ['class' => 'btn btn-success glyphicon glyphicon-edit']) ?>
                    <?php } ?>
                </div>
            </div> 
        </div>
    </div>



</div>

<?php

use yii\helpers\Html;
use backend\models\TblCama;

if (!Yii::$app->user->isGuest) {
    $model = \frontend\models\TblAccount::find()->where(['id_account' => Yii::$app->user->id])->one();
    $cama = TblCama::find()->where(['id_account' => Yii::$app->user->id])->one();
    $asigment = backend\models\AuthAssignment::find()->where(['user_id' => Yii::$app->user->id])->one();
    
}
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
<?php if (!Yii::$app->user->isGuest && $cama->foto != NULL) { ?>
                <div class="pull-left image">
                    <img src="<?= "../../fotoprofil/" . $model->id_account . '.jpg' ?>" class="user-image" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p><?= $model->username ?></p>
                </div>
<?php } elseif (!Yii::$app->user->isGuest && $cama->foto == NULL) { ?>
                <div class="pull-left image">
                    <img src="../../fotoprofil/avatar3.png" class="user-image" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p><?= $model->username ?></p>
                </div>
                <?php
            } else {
                ?>
                <div class="pull-left image">
                    <img src="../../fotoprofil/avatar3.png" class="user-image" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Guest</p>
                </div>
<?php } ?>


        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        
        <?php if ($asigment->item_name == "admin") { ?>
            <?=
            dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu'],
                        'items' => [
                            ['label' => 'Menu ', 'options' => ['class' => 'header']],
                            ['label' => 'Event', 'icon' => 'fa fa-file-code-o', 'url' => ['event/index']],
                            ['label' => 'Konfirmasi Pembayaran', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-pembayaran/viewkonfirmasi']],
                            ['label' => 'Create Pendaftaran', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-gelombang/index']],
                            ['label' => 'Pembayaran Gagal', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-pembayaran/viewreject']],
                            ['label' => 'Pembayaran Berhasil', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-pembayaran/viewaprove']],
                            ['label' => 'Konfirmasi Kelulusan', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-cama/viewkonfirmasi']],
                            [
                                'label' => 'Daftar Mahasiswa',
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Mahasiswa Diterima', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-cama/viewcamalulus'],],
                                    ['label' => 'Mahsiswa Gagal', 'icon' => 'fa fa-dashboard', 'url' => ['tbl-cama/viewcamagagal'],],
                                ],
                            ],
                            ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index']],
                            ['label' => 'Ubah Role', 'icon' => 'fa fa-file-code-o', 'url' => ['auth-assignment/index']],
                        ],
                    ]
            )
            ?>
        <?php } if ($asigment->item_name == "keuangan") { ?>
            <?=
            dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu'],
                        'items' => [
                            ['label' => 'Menu ', 'options' => ['class' => 'header']],
                            ['label' => 'Event', 'icon' => 'fa fa-file-code-o', 'url' => ['event/index']],
                            ['label' => 'Konfirmasi Pembayaran', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-pembayaran/viewkonfirmasi']],
                            ['label' => 'Pembayaran Gagal', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-pembayaran/viewreject']],
                            ['label' => 'Pembayaran Berhasil', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-pembayaran/viewaprove']],
                            ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index']],
                        ],
                    ]
            )
            ?>
            <?php } if ($asigment->item_name == "staff") { ?> 
            <?=
            dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu'],
                        'items' => [
                            ['label' => 'Menu ', 'options' => ['class' => 'header']],
                            ['label' => 'Event', 'icon' => 'fa fa-file-code-o', 'url' => ['event/index']],
                            ['label' => 'Create Pendaftaran', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-gelombang/index']],
                            ['label' => 'Konfirmasi Kelulusan', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-cama/viewkonfirmasi']],
                            [
                                'label' => 'Daftar Mahasiswa',
                                'icon' => 'fa fa-share',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Mahasiswa Diterima', 'icon' => 'fa fa-file-code-o', 'url' => ['tbl-cama/viewcamalulus'],],
                                    ['label' => 'Mahsiswa Gagal', 'icon' => 'fa fa-dashboard', 'url' => ['tbl-cama/viewcamagagal'],],
                                ],
                            ],
                            ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index']],
                        ],
                    ]
            )
            ?>
        <?php } ?>


    </section>

</aside>

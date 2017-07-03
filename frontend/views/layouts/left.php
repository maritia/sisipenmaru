<?php

use yii\helpers\Html;
use common\models\TblAccount;
use common\models\AuthAssignment;
use frontend\models\TblCama;

/* @var $this \yii\web\View */
/* @var $content string */
if (!Yii::$app->user->isGuest) {
    $model = TblAccount::find()->where(['id_account' => Yii::$app->user->id])->one();
    $cama = TblCama::find()->where(['id_account' => Yii::$app->user->id])->one();
    $asigment = AuthAssignment::find()->where(['user_id' => Yii::$app->user->id])->one();
    if (!empty($cama)) {
        $ortu = \frontend\models\TblOrtu::find()->where(['id_cama' => $cama->id_cama])->one();
        $bayar = \frontend\models\TblPembayaran::find()->where(['id_cama' => $cama->id_cama])->one();
    }
}
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <?php
        if (!Yii::$app->user->isGuest) {
            if ($asigment->item_name == "admin") {
                ?>
                <?=
                dmstr\widgets\Menu::widget(
                        [
                            'options' => ['class' => 'sidebar-menu'],
                            'items' => [
                                ['label' => 'Menu ', 'options' => ['class' => 'header']],
                                ['label' => 'Beranda', 'icon' => 'fa fa-dashboard', 'url' => ['site/index',]],
                                ['label' => 'Kalender Kegiatan', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['event/index']],
                                ['label' => 'Konfirmasi Pembayaran', 'icon' => 'fa fa-check-square', 'url' => ['tbl-pembayaran/viewkonfirmasi']],
                                ['label' => 'Kelola Gelombang Pendaftaran', 'icon' => 'fa fa-plus-circle', 'url' => ['tbl-gelombang/index']],
                                ['label' => 'Daftar Peserta Test', 'icon' => 'fa fa-check', 'url' => ['tbl-pembayaran/viewpeserta']],
                                ['label' => 'Pembayaran Gagal', 'icon' => 'fa fa-warning', 'url' => ['tbl-pembayaran/viewreject']],
                                ['label' => 'Pembayaran Berhasil', 'icon' => 'fa fa-check', 'url' => ['tbl-pembayaran/viewaprove']],
                                ['label' => 'Konfirmasi Kelulusan', 'icon' => 'fa fa-check-square', 'url' => ['tbl-cama/viewkonfirmasi']],
                                [
                                    'label' => 'Daftar Mahasiswa',
                                    'icon' => 'fa fa-share',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Mahasiswa Lulus', 'icon' => 'fa fa-star', 'url' => ['tbl-cama/viewcamalulus'],],
                                        ['label' => 'Mahasiswa Tidak Lulus', 'icon' => 'fa fa-warning', 'url' => ['tbl-cama/viewcamagagal'],],
                                    ],
                                ],
                                ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index']],
                                ['label' => 'Ubah Hak Akses', 'icon' => 'fa fa-circle', 'url' => ['auth-assignment/index']],
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
                                ['label' => 'Beranda', 'icon' => 'fa fa-dashboard', 'url' => ['site/index',]],
                                ['label' => 'Kalender Kegiatan', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['event/index']],
                                ['label' => 'Konfirmasi Pembayaran', 'icon' => 'fa fa-check-square', 'url' => ['tbl-pembayaran/viewkonfirmasi']],
                                ['label' => 'Daftar Peserta Test', 'icon' => 'fa fa-check', 'url' => ['tbl-pembayaran/viewpeserta']],
                                ['label' => 'Pembayaran Gagal', 'icon' => 'fa fa-warning', 'url' => ['tbl-pembayaran/viewreject']],
                                ['label' => 'Pembayaran Berhasil', 'icon' => 'fa fa-check', 'url' => ['tbl-pembayaran/viewaprove']],
                                ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index']],
                            ],
                        ]
                )
                ?>
            <?php } if ($asigment->item_name == "akademik") { ?> 
                <?=
                dmstr\widgets\Menu::widget(
                        [
                            'options' => ['class' => 'sidebar-menu'],
                            'items' => [
                                ['label' => 'Menu ', 'options' => ['class' => 'header']],
                                ['label' => 'Beranda', 'icon' => 'fa fa-dashboard', 'url' => ['site/index',]],
                                ['label' => 'Kalender Kegiatan', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['event/index']],
                                ['label' => 'Kelola Gelombang Pendaftaran', 'icon' => 'fa fa-plus-circle', 'url' => ['tbl-gelombang/index']],
                                ['label' => 'Daftar Peserta Test', 'icon' => 'fa fa-check', 'url' => ['tbl-pembayaran/viewpeserta']],
                                ['label' => 'Konfirmasi Kelulusan', 'icon' => 'fa fa-check-square', 'url' => ['tbl-cama/viewkonfirmasi']],
                                [
                                    'label' => 'Daftar Mahasiswa',
                                    'icon' => 'fa fa-share',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Mahasiswa Lulus', 'icon' => 'fa fa-star', 'url' => ['tbl-cama/viewcamalulus'],],
                                        ['label' => 'Mahasiswa Tidak Lulus', 'icon' => 'fa fa-warning', 'url' => ['tbl-cama/viewcamagagal'],],
                                    ],
                                ],
                                ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index']],
                            ],
                        ]
                )
                ?>
                <?php
            } if ($asigment->item_name == "student") {
                if (empty($cama)) {
                    ?>
                    <?=
                    dmstr\widgets\Menu::widget(
                            [

                                'options' => ['class' => 'sidebar-menu'],
                                'items' => [
                                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                                    ['label' => 'Beranda', 'icon' => 'fa fa-dashboard', 'url' => ['site/index',]],
                                    ['label' => 'Daftar',
                                        'icon' => 'fa fa-plus-square',
                                        'url' => ['tbl-cama/create']],
                                    ['label' => 'Verifikasi Pembayaran', 'icon' => 'fa fa-money', 'url' => ['tbl-pembayaran/error']],
                                    ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index',]],
                                    ['label' => 'Kalender Kegiatan', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['event/index']],
                                ],
                            ]
                    )
                    ?>
                    <?php
                } else {
                    if (empty($ortu)) {
                        ?>
                        <?=
                        dmstr\widgets\Menu::widget(
                                [

                                    'options' => ['class' => 'sidebar-menu'],
                                    'items' => [
                                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                                        ['label' => 'Beranda', 'icon' => 'fa fa-dashboard', 'url' => ['site/index',]],
                                        ['label' => 'Data Diri',
                                            'icon' => 'fa fa-user-md',
                                            'url' => ['tbl-cama/view', 'id' => $cama->id_cama]],
                                        ['label' => 'Verifikasi Pembayaran', 'icon' => 'fa fa-money', 'url' => ['tbl-pembayaran/error']],
                                        ['label' => 'Kalender Kegiatan', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['event/index']],
                                        ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index',]],
                                    ],
                                ]
                        )
                        ?>
                        <?php
                    } else {
                        if (empty($bayar)) {
                            ?>
                            <?=
                            dmstr\widgets\Menu::widget(
                                    [

                                        'options' => ['class' => 'sidebar-menu'],
                                        'items' => [
                                            ['label' => 'Menu', 'options' => ['class' => 'header']],
                                            ['label' => 'Beranda', 'icon' => 'fa fa-dashboard', 'url' => ['site/index',]],
                                            ['label' => 'Data Diri',
                                                'icon' => 'fa fa-user-md',
                                                'url' => ['tbl-cama/view', 'id' => $cama->id_cama]],
                                            ['label' => 'Verifikasi Pembayaran', 'icon' => 'fa fa-money', 'url' => ['tbl-pembayaran/create']],
                                            ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index',]],
                                            ['label' => 'Kalender Kegiatan', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['event/index']],
                                        ],
                                    ]
                            )
                            ?>

                        <?php } else {
                            ?>
                            <?=
                            dmstr\widgets\Menu::widget(
                                    [

                                        'options' => ['class' => 'sidebar-menu'],
                                        'items' => [
                                            ['label' => 'Menu', 'options' => ['class' => 'header']],
                                            ['label' => 'Beranda', 'icon' => 'fa fa-dashboard', 'url' => ['site/index',]],
                                            ['label' => 'Data Diri',
                                                'icon' => 'fa fa-user-md',
                                                'url' => ['tbl-cama/view', 'id' => $cama->id_cama]],
                                            ['label' => 'Verifikasi Pembayaran', 'icon' => 'fa fa-money', 'url' => ['tbl-pembayaran/view', 'id' => $bayar->id_pembayaran]],
                                            ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index',]],
                                            ['label' => 'Kalender Kegiatan', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['event/index']],
                                        ],
                                    ]
                            )
                            ?>

                            <?php
                        }
                    }
                }
                ?>

                <?php
            }
        } else {
            ?>
            <?=
            dmstr\widgets\Menu::widget(
                    [

                        'options' => ['class' => 'sidebar-menu'],
                        'items' => [
                            ['label' => 'Menu', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'fa fa-dashboard', 'url' => ['site/index',]],
                            ['label' => 'Register', 'icon' => 'fa fa-user-plus', 'url' => ['site/register']],
                            ['label' => 'Pengumuman', 'icon' => 'glyphicon glyphicon-info-sign', 'url' => ['tbl-pengumuman/index',]],
                            ['label' => 'Kalender Kegiatan', 'icon' => 'glyphicon glyphicon-calendar', 'url' => ['event/index']],
                        ],
                    ]
            )
            ?>
        <?php } ?> 
    </section>

</aside>

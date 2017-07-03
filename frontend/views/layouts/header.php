<?php

use yii\helpers\Html;
use frontend\models\TblCama;

/* @var $this \yii\web\View */
/* @var $content string */
$model = common\models\TblAccount::find()->where(['id_account' => Yii::$app->user->id])->one();
$cama = TblCama::find()->where(['id_account' => Yii::$app->user->id])->one();
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><img src="../../fotoprofil/akfar.png"></span><span class="logo-lg"><img src="../../fotoprofil/akfar.png"> &nbsp;&nbsp;&nbsp;SIPENMARU</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->

                <?php
                if (!Yii::$app->user->isGuest && !empty($cama)) {
                    $notif = frontend\models\Notification::find()->where(['id_cama' => $cama->id_cama])->count();
                    $notifi = frontend\models\Notification::find()->where(['id_cama' => $cama->id_cama])->all();
                    ?>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning"><?= $notif ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?= $notif ?> notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php
                                    if ($notif != 0) {
                                        foreach ($notifi as $country):
                                            ?>
                                            <li>
                                                <?php if ($country->keterangan == "Pembayaran Anda Telah di Konfirmasi, silahkan mengikuti test selanjutnya") { ?>
                                                    <?=
                                                    Html::a(' ' . $country->keterangan, ['tbl-pembayaran/confirm', 'id' => Yii::$app->user->id], ['class' => 'fa fa-bullhorn text-red']
                                                    )
                                                    ?>
                                                <?php } else {
                                                                ?>
                                                    <i class="fa  fa-bullhorn text-red"></i> <?= Html::encode("{$country->keterangan}") ?>

                                                <?php } ?>


                                            </li>
                                            <?php
                                        endforeach;
                                    }
                                    ?>
                                </ul>
                            </li>
                            <!--                            <li class="footer"><a href="#">View all</a></li>-->
                        </ul>
                    </li>
                <?php } ?>

                <!-- Tasks: style can be found in dropdown.less -->
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        if (!empty($cama)) {
                            if ($cama->foto != NULL) {
                                ?>
                                <img src="<?= "../../fotoprofil/" . Yii::$app->user->id . ".jpg" ?>" class="user-image" alt="User Image"/>
                                <span class="hidden-xs"><?= $model->username ?></span>
                            <?php } elseif ($cama->foto == NULL) { ?>
                                <img src="../../fotoprofil/avatar3.png" class="user-image" alt="User Image"/>
                                <span class="hidden-xs"><?= $model->username ?></span>
                            <?php } else {
                                ?>
                                <img src="../../fotoprofil/avatar3.png" class="user-image" alt="User Image"/>
                                <span class="hidden-xs">Guest</span>
                                <?php
                            }
                        } else {
                            if (Yii::$app->user->can('student') || Yii::$app->user->can('keuangan')) {
                                ?>
                                <div class="pull-left image">
                                    <img src="../../fotoprofil/avatar3.png" class="user-image" alt="User Image"/>
                                </div>
                                <span class="hidden-xs">
                                    <?= $model->username ?>
                                </span>
                                <?php
                            } else {
                                ?>
                                <img src="../../fotoprofil/avatar3.png" class="user-image" alt="User Image"/>
                                <span class="hidden-xs">Guest</span>
                                <?php
                            }
                        }
                        ?>

                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                            <?php
                            if (!empty($cama)) {
                                ?>
                                <img src="<?= "../../fotoprofil/" . $cama->foto ?>" class="img-circle" alt="User Image"/>
                                <p>
                                    <span class="hidden-xs"><?= $model->username ?></span>
                                </p>
                                <?php
                            } else {
                                ?>
                                <img src="../../fotoprofil/avatar3.png" class="img-circle" alt="User Image"/>
                                <p>
                                    <span class="hidden-xs">Guest</span>
                                </p>
                                <?php
                            }
                            ?>


                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <?php if (!Yii::$app->user->isGuest) {
                                ?>
                                <div class="pull-left">
                                    <?=
                                    Html::a(
                                            'Profil', ['/tbl-account/view', 'id' => Yii::$app->user->id], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    )
                                    ?>
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <?=
                                    Html::a(
                                            'Sign out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    )
                                    ?>
                                </div>
                            <?php } else {
                                ?>

                                <div class="pull-right">
                                    <?=
                                    Html::a(
                                            'Sign in', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    )
                                    ?>
                                </div>
                            <?php } ?>

                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <!--                <li>
                                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                </li>-->
            </ul>
        </div>
    </nav>
</header>

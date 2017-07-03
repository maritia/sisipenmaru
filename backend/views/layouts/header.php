<?php

use yii\helpers\Html;
use backend\models\TblCama;

/* @var $this \yii\web\View */
/* @var $content string */
$model = common\models\TblAccount::find()->where(['id_account' => Yii::$app->user->id])->one();
$cama = TblCama::find()->where(['id_account' => Yii::$app->user->id])->one();
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if (!Yii::$app->user->isGuest && $cama->foto != NULL) { ?>
                            <img src="<?= "../../fotoprofil/" . Yii::$app->user->id . ".jpg" ?>" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?= $model->username ?></span>
                        <?php } elseif (!Yii::$app->user->isGuest && $cama->foto == NULL) { ?>
                            <img src="../../fotoprofil/avatar3.png" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?= $model->username ?></span>
                        <?php } else {
                            ?>
                            <img src="../../fotoprofil/avatar3.png" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">Guest</span>
                        <?php } ?>

                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                            <?php if (!Yii::$app->user->isGuest && $cama->foto != NULL) { ?>
                                <img src="<?= "../../fotoprofil/" . Yii::$app->user->id . ".jpg" ?>" class="img-circle" alt="User Image"/>
                                <p>
                                    <span class="hidden-xs"><?= $model->username ?></span>
                                </p>
                            <?php } elseif (!Yii::$app->user->isGuest && $cama->foto == NULL) { ?>
                                <img src="../../fotoprofil/avatar3.png" class="img-circle" alt="User Image"/>
                                <p>
                                    <span class="hidden-xs"><?= $model->username ?></span>
                                </p>
                            <?php } else {
                                ?>
                                <img src="../../fotoprofil/avatar3.png" class="img-circle" alt="User Image"/>
                                <p>
                                    <span class="hidden-xs">Guest</span>
                                </p>
                            <?php } ?>

                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?=
                                Html::a(
                                        'Sign out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kalender Kegiatan';

//$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => 'Create Event', 'url' => ['create']];
?>

<div class="event-index">
    <div class="row">
        <div class="col-xs-12">

            <!-- Modal -->

            <div class="box box-danger">

                <div class="box-body">

                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

                    <?=
                    \yii2fullcalendar\yii2fullcalendar::widget(array(
                        'events' => $events,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

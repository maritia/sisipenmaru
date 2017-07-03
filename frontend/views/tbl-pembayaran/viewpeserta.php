<?php

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Daftar Calon Mahasiswa Lulus';
$this->params['breadcrumbs'][] = $this->title;


$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'label' => 'Nomor Pendaftaran  ',
        'format' => 'raw',
        'value' => function($data) {
            $cama = \frontend\models\TblCama::find()->where(['id_cama' => $data->id_cama])->one();
            return '<div>' . $cama->no_pendaftaran . '</div>';
        }
            ], [
                'label' => 'Asal Sekolah',
                'format' => 'raw',
                'value' => function($data) {
                    $cama = \frontend\models\TblCama::find()->where(['id_cama' => $data->id_cama])->one();
                    $sekolah = \frontend\models\AsalSekolah::find()->where(['id'=>$cama->id_sekolah])->one();
                    return '<div>' . $sekolah->nama_sekolah. '</div>';
                }
                    ],
                ];
                $fullExportMenu = ExportMenu::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => $gridColumns,
                            'target' => ExportMenu::TARGET_BLANK,
                            'fontAwesome' => true,
                            'asDropdown' => false, // this is important for this case so we just need to get a HTML list    
                            'dropdownOptions' => [
                                'label' => '<i class="glyphicon glyphicon-export"></i> Full'
                            ],
                ]);
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $gridColumns,
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Mahasiswa lulus</h3>',
                    ],
                    // the toolbar setting is default
                    'toolbar' => [
                        '{export}',
                    ],
                        // configure your GRID inbuilt export dropdown to include additional items
//                    'export' => [
//                        'fontAwesome' => true,
//                        'itemsAfter' => [
//                            '<li role="presentation" class="divider"></li>',
//                            '<li class="dropdown-header">Export All Data</li>',
//                            $fullExportMenu
//                        ]
//                    ],
                ]);
?>

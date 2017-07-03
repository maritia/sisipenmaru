<?php

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Daftar Calon Mahasiswa Lulus';
$this->params['breadcrumbs'][] = $this->title;


$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    'no_pendaftaran',
    'nama',
    'alamat',
    //'tmp_lahir',
//'tgl_lahir',
// 'jk',
    [
        'label' => 'Asal Sekolah',
        'format' => 'raw',
        'value' => function($data) {
            $cama = \frontend\models\AsalSekolah::find()->where(['id' => $data->id_sekolah])->one();
            return '<div>' . $cama->nama_sekolah . '</div>';
        }
            ],
//    [
//        'label' => 'Action',
//        'format' => 'raw',
//        'value' => function($data) {
//            return '<div>'
//                    . Html::a('Reject', [
//                        'tbl-cama/reject', 'page' => 'expired', 'id' => $data->id_cama,], [
//                        'class' => 'btn btn-primary',
//                        'data' => [
//                            'message' => 'Book Returned?',
//                        //'method' => 'post',
//                        ],]
//                    ) . '</div>';
//        }
//            ],
                //['class' => 'yii\grid\ActionColumn'],
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

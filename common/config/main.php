<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'auth' => [
            'class' => 'common\modules\auth\Module',
        ],
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => 'uploads/',
            'uploadUrl' => '@web/uploads/',
//            'imageUploadRoute' => ['@backend/uploads/'],
//            'fileUploadRoute' => ['@backend/uploads/'],
//            'imageManagerJsonRoute' => ['@backend/uploads/'],
//            'fileManagerJsonRoute' => ['@backend/uploads/'],
//            'imageAllowExtensions' => ['jpg', 'png', 'gif']
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
            //'downloadAction' => 'export',
            'downloadAction' => 'gridview/export/download',
        ],
//        'PasswordInput'=>[
//            'class'=>'kartik\password\PaswordInput',
//        ]
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_MailTransport',
            ],
            'useFileTransport' => false,
        ],
    ],
];

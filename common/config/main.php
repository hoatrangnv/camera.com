<?php
return [
    'language' => 'vi-VN',
    'charset' => 'UTF-8',
    'name' => 'PhuongTruongThinh.com',
    'version' => '1.0',
    
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            // database config
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=camera_com',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => '',
                'username' => '',
                'password' => '',
//                'port' => '587',
//                'encryption' => 'tls',
                'port' => '465',
                'encryption' => 'ssl',
            ], 
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'common\models\User',
                    'idField' => 'id', // id field of model User
                ]
            ],
        ]
    ],    
];

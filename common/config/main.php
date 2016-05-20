<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache'   => [
            'class' => 'yii\caching\FileCache',
        ],
//        'db'      => [
//            'class'    => 'yii\db\Connection',
//            'dsn'      => 'mysql:host=localhost;dbname=yii2_demo',
//            'username' => 'root',
//            'password' => '',
//            'charset'  => 'utf8',
//        ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn'   => 'mongodb://localhost:27017/students_era',
            //'dsn'   => 'mongodb://localhost:27017/test',
        ],
        'mail'    => [
            'class'            => 'yii\swiftmailer\Mailer',
            //'viewPath' => '@common/mail',
// send all mails to a file by default. You have to set
// 'useFileTransport' to false and configure a transport
// for the mailer to send real emails.
            'useFileTransport' => false,
            //'useFileTransport' => false,//to send mails to real email addresses else will get stored in your mail/runtime folder
//comment the following array to send mail using php's mail function
            
        ],
    ],
];

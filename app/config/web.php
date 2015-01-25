<?php

  $params = require(__DIR__ . '/params.php');

  $config = [
    'id'         => 'basic',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'components' => [
      'request'      => [
        'cookieValidationKey' => 'Ue0kzrOvlmN0Cqqth6ZXDOwOQGgNjrts',
      ],
      'cache'        => [
        'class' => 'yii\caching\FileCache',
      ],
      'user'         => [
        'identityClass'   => 'app\models\Users',
        'enableAutoLogin' => TRUE,
      ],
      'errorHandler' => [
        'errorAction' => 'site/error',
      ],
      'mailer'       => [
        'class'            => 'yii\swiftmailer\Mailer',
        'useFileTransport' => TRUE,
      ],
      'log'          => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets'    => [
          [
            'class'  => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
          ],
        ],
      ],
      'db'           => require(__DIR__ . '/db.php'),
      'urlManager'   => [
        'enablePrettyUrl'     => TRUE,
        'showScriptName'      => FALSE,
        'enableStrictParsing' => TRUE,
        'rules'               => [
          'new-load'      => 'load/create',
          'edit-load'     => 'load/update',
          'delete-load'   => 'load/delete',
          'get-new-loads' => 'load/get',
          'login'         => 'site/login',
          'logout'        => 'site/logout',
          ''              => 'site/index',
        ],
      ],

    ],
    'params'     => $params,
  ];

  if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
  }

  return $config;

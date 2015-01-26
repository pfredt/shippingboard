<?php

  defined('YII_DEBUG') or define('YII_DEBUG', TRUE);
  defined('YII_ENV') or define('YII_ENV', 'dev');

  require(__DIR__ . '/app/vendor/autoload.php');
  require(__DIR__ . '/app/vendor/yiisoft/yii2/Yii.php');


  $config = require(__DIR__ . '/app/config/web.php');

  (new yii\web\Application($config))->run();

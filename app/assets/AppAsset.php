<?php
  /**
   * @link http://www.yiiframework.com/
   * @copyright Copyright (c) 2008 Yii Software LLC
   * @license http://www.yiiframework.com/license/
   */

  namespace app\assets;

  use yii\web\AssetBundle;

  /**
   * @author Qiang Xue <qiang.xue@gmail.com>
   * @since 2.0
   */
  class AppAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
<<<<<<< HEAD
      'css/datepicker3.css',
      'css/jquery.stepper.css',
      'css/bootstrap.colorpickersliders.css',
      'css/site.css',
    ];
    public $js = [
      'http://cdnjs.cloudflare.com/ajax/libs/tinycolor/0.11.1/tinycolor.min.js',
      'js/bootstrap-datepicker.js',
      'js/bootstrap.colorpickersliders.js',
=======
      'css/site.css',
      'css/datepicker3.css',
      'css/jquery.stepper.css',
    ];
    public $js = [
      'js/bootstrap-datepicker.js',
>>>>>>> 2558046e9c6f30960af49028f08c9a4981e60b88
      'js/jquery.stepper.js',
      'js/templ.js',
      'js/init.js',
    ];
    public $depends = [
      'yii\web\YiiAsset',
<<<<<<< HEAD
      'yii\bootstrap\BootstrapPluginAsset',
=======
      'yii\bootstrap\BootstrapAsset',
>>>>>>> 2558046e9c6f30960af49028f08c9a4981e60b88
    ];
  }

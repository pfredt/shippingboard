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
      'css/site.css',
      'css/datepicker3.css',
      'css/jquery.stepper.css',
    ];
    public $js = [
      'js/bootstrap-datepicker.js',
      'js/jquery.stepper.js',
      'js/templ.js',
      'js/init.js',
    ];
    public $depends = [
      'yii\web\YiiAsset',
      'yii\bootstrap\BootstrapAsset',
    ];
  }

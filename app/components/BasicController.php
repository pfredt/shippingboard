<?php

  namespace app\components;

  use Yii;
  use yii\web\Controller;
  use app\models\Config;

  class BasicController extends Controller {
    public $config = [];

    public function init() {

      $items = Config::find()->all();

      if ($items) foreach ($items as $item) {
        $this->config[$item->key] = $item->value;
      }

      Yii::$app->params['config'] = $this->config;
    }
  }

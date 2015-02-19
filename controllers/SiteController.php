<?php

  namespace app\controllers;

  use app\models\Config;
  use Yii;
  use yii\filters\AccessControl;
  use app\components\BasicController;
  use yii\filters\VerbFilter;
  use app\models\LoginForm;
  use app\models\TrailerLoad;


  class SiteController extends BasicController {
    public function behaviors() {
      return [
        'access' => [
          'class' => AccessControl::className(),
          'only'  => ['logout'],
          'rules' => [
            [
              'actions' => ['logout'],
              'allow'   => TRUE,
              'roles'   => ['@'],
            ],
          ],
        ],
        'verbs'  => [
          'class'   => VerbFilter::className(),
          'actions' => [
            'logout' => ['post'],
          ],
        ],
      ];
    }

    public function actions() {
      return [
        'error' => [
          'class' => 'yii\web\ErrorAction',
        ],
      ];
    }

    public function actionIndex($showCompleted = 0) {
      $query = TrailerLoad::find()->orderBy('shipping_date asc')->where(['>=', 'shipping_date', mktime(0, 0, 0)])->andWhere(['<', 'shipping_date', mktime(0, 0, 0) + 9 * 24 * 60 * 60]);

      if (Yii::$app->user->isGuest)
        $showCompleted = 0;

      if (!$showCompleted)
        $query->andWhere(['completed' => 0]);

      $items = $query->all();

      return $this->render('index', [
        'items'         => $items,
        'showCompleted' => $showCompleted,
      ]);
    }

    public function actionLogin() {
      if (!\Yii::$app->user->isGuest) {
        return $this->goHome();
      }

      $model = new LoginForm();
      if ($model->load(Yii::$app->request->post()) && $model->login()) {
        return $this->redirect(['load/create']);
      } else {
        return $this->render('login', [
          'model' => $model,
        ]);
      }
    }

    public function actionLogout() {
      Yii::$app->user->logout();

      return $this->goHome();
    }

    public function actionAbout() {
      return $this->render('about');
    }

    public function actionConfig() {
      $config = Config::find()->all();

      if ($config)
        foreach ($config as $item) {
          if (Yii::$app->request->post("Config")['id'] == $item->id) {
            if ($item->load(Yii::$app->request->post()) && $item->save()) {
              return $this->refresh();
            }
          }
        }

      return $this->render("config", ['items' => $config]);
    }
  }

<?php

  namespace app\controllers;

<<<<<<< HEAD
  use app\models\Config;
  use Yii;
  use yii\filters\AccessControl;
  use app\components\BasicController;
=======
  use Yii;
  use yii\filters\AccessControl;
  use yii\web\Controller;
>>>>>>> 2558046e9c6f30960af49028f08c9a4981e60b88
  use yii\filters\VerbFilter;
  use app\models\LoginForm;
  use app\models\TrailerLoad;

<<<<<<< HEAD

  class SiteController extends BasicController {
=======
  class SiteController extends Controller {
>>>>>>> 2558046e9c6f30960af49028f08c9a4981e60b88
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
<<<<<<< HEAD
        'error' => [
          'class' => 'yii\web\ErrorAction',
        ],
=======
        'error'   => [
          'class' => 'yii\web\ErrorAction',
        ],
        'captcha' => [
          'class'           => 'yii\captcha\CaptchaAction',
          'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : NULL,
        ],
>>>>>>> 2558046e9c6f30960af49028f08c9a4981e60b88
      ];
    }

    public function actionIndex($showCompleted = 0) {
      $query = TrailerLoad::find()->orderBy('shipping_date asc')->where(['>=', 'shipping_date', mktime(0, 0, 0)])->andWhere(['<', 'shipping_date', mktime(0, 0, 0) + 7 * 24 * 60 * 60]);

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
<<<<<<< HEAD

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
=======
>>>>>>> 2558046e9c6f30960af49028f08c9a4981e60b88
  }

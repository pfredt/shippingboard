<?php

  namespace app\controllers;

  use app\models\Config;
  use app\models\SearchModel;
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
          'only'  => [ 'logout' ],
          'rules' => [
            [
              'actions' => [ 'logout' ],
              'allow'   => TRUE,
              'roles'   => [ '@' ],
            ],
          ],
        ],
        'verbs'  => [
          'class'   => VerbFilter::className(),
          'actions' => [
            'logout' => [ 'post' ],
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
      $query = TrailerLoad::find()->orderBy( 'shipping_date asc' )->where( [ '>=', 'shipping_date', mktime( 0, 0, 0 ) ] )->andWhere( [ '<', 'shipping_date', mktime( 0, 0, 0 ) + 9 * 24 * 60 * 60 ] );

      $query->orWhere( ' (`completed` = 0 AND `shipping_date` < ' . mktime( 0, 0, 0 ) . ') ' );

      if ( Yii::$app->user->isGuest )
        $showCompleted = 0;

      if ( !$showCompleted )
        $query->andWhere( [ 'completed' => 0 ] );

      $items = $query->all();

      $spas_total = TrailerLoad::find()->where( [ 'completed' => 1 ] )->andWhere( [ '<=', 'shipping_date', mktime( 0, 0, 0 ) ] )->andWhere( [ '>=', 'shipping_date', mktime( 0, 0, 0 ) - 31 * 24 * 60 * 60 ] )->sum( 'number_of_spas' );
      $swim_total = TrailerLoad::find()->where( [ 'completed' => 1 ] )->andWhere( [ '<=', 'shipping_date', mktime( 0, 0, 0 ) ] )->andWhere( [ '>=', 'shipping_date', mktime( 0, 0, 0 ) - 31 * 24 * 60 * 60 ] )->sum( 'number_of_swimspas' );

      if ( $spas_total == NULL )
        $spas_total = 0;
      if ( $swim_total == NULL )
        $swim_total = 0;


      return $this->render( 'index', [
        'items'         => $items,
        'showCompleted' => $showCompleted,
        'spas_total'    => $spas_total,
        'swim_total'    => $swim_total,
      ] );
    }

    public function actionHistory() {
      $model = new SearchModel();
      $model->from = time() - 60 * 60 * 24;
      $model->to = time();

      if ( $model->load( Yii::$app->request->post() ) && $model->doo() ) ;

      $query = TrailerLoad::find()->orderBy( 'shipping_date asc' );

      $query->where( [ '>=', 'shipping_date', $model->from ] )->andWhere( [ '<', 'shipping_date', $model->to ] );

      $items = $query->all();

      return $this->render( 'history', [
        'items' => $items,
        'model' => $model,
      ] );
    }

    public function actionLogin() {
      if ( !\Yii::$app->user->isGuest ) {
        return $this->goHome();
      }

      $model = new LoginForm();
      if ( $model->load( Yii::$app->request->post() ) && $model->login() ) {
        return $this->redirect( [ 'load/create' ] );
      } else {
        return $this->render( 'login', [
          'model' => $model,
        ] );
      }
    }

    public function actionLogout() {
      Yii::$app->user->logout();

      return $this->goHome();
    }

    public function actionAbout() {
      return $this->render( 'about' );
    }

    public function actionConfig() {
      $config = Config::find()->all();

      if ( $config )
        foreach ( $config as $item ) {
          if ( Yii::$app->request->post( "Config" )[ 'id' ] == $item->id ) {
            if ( $item->load( Yii::$app->request->post() ) && $item->save() ) {
              return $this->refresh();
            }
          }
        }

      return $this->render( "config", [ 'items' => $config ] );
    }
  }

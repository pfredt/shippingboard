<?php

  namespace app\controllers;

  use Yii;
  use app\models\TrailerLoad;
  use app\components\BasicController;
  use yii\web\NotFoundHttpException;
  use yii\filters\AccessControl;

  /**
   * LoadController implements the CRUD actions for TrailerLoad model.
   */
  class LoadController extends BasicController {
    public function behaviors() {
      return [
        'access' => [
          'class' => AccessControl::className(),
          'only'  => [ 'create', 'update', 'delete' ],
          'rules' => [
            [
              'allow'   => TRUE,
              'actions' => [ 'create', 'update', 'delete' ],
              'roles'   => [ '@' ],
            ],
          ],
        ]
      ];
    }

    /**
     * Return list of model in html.
     *
     * @return mixed
     */
    public function actionGet() {
      $showCompleted = Yii::$app->request->get( 'showCompleted' );

      $query = TrailerLoad::find()->orderBy( 'shipping_date asc' )->where( [ '>=', 'shipping_date', mktime( 0, 0, 0 ) ] )->andWhere( [ '<', 'shipping_date', mktime( 0, 0, 0 ) + 9 * 24 * 60 * 60 ] );

      $query->orWhere( ' (`completed` = 0 AND `shipping_date` < ' . mktime( 0, 0, 0 ) . ') ' );

      if ( !$showCompleted )
        $query->andWhere( [ 'completed' => 0 ] );

      $items = $query->all();


      $spas_total = TrailerLoad::find()->where( [ 'completed' => 1 ] )->andWhere( [ '<=', 'shipping_date', mktime( 0, 0, 0 ) ] )->andWhere( [ '>=', 'shipping_date', mktime( 0, 0, 0 ) - 31 * 24 * 60 * 60 ] )->sum( 'number_of_spas' );
      $swim_total = TrailerLoad::find()->where( [ 'completed' => 1 ] )->andWhere( [ '<=', 'shipping_date', mktime( 0, 0, 0 ) ] )->andWhere( [ '>=', 'shipping_date', mktime( 0, 0, 0 ) - 31 * 24 * 60 * 60 ] )->sum( 'number_of_swimspas' );

      if ( $spas_total == NULL )
        $spas_total = 0;
      if ( $swim_total == NULL )
        $swim_total = 0;

      return $this->renderFile( "@app/views/common/table.php", [
        'items'      => $items,
        'spas_total' => $spas_total,
        'swim_total' => $swim_total,
      ] );
    }


    /**
     * Creates a new TrailerLoad model.
     * If creation is successful, the browser will be redirected to main page.
     *
     * @return mixed
     */
    public
    function actionCreate() {
      $model = new TrailerLoad();

      if ( $model->load( Yii::$app->request->post() ) && $model->save() ) {
        return $this->redirect( [ 'create' ] );
      } else {
        return $this->render( 'create', [
          'model' => $model,
        ] );
      }
    }

    /**
     * Updates an existing TrailerLoad model.
     * If update is successful, the browser will be redirected to main page.
     *
     * @param string $id
     *
     * @return mixed
     */
    public
    function actionUpdate( $id ) {
      $model = $this->findModel( $id );

      if ( $model->load( Yii::$app->request->post() ) && $model->save() ) {
        return $this->redirect( [ 'site/index' ] );
      } else {
        return $this->render( 'update', [
          'model' => $model,
        ] );
      }
    }

    /**
     * Deletes an existing TrailerLoad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param string $id
     *
     * @return mixed
     */
    public
    function actionDelete( $id ) {
      $this->findModel( $id )->delete();

      return $this->redirect( [ 'site/index' ] );
    }

    /**
     * Finds the TrailerLoad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param string $id
     *
     * @return TrailerLoad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel( $id ) {
      if ( ( $model = TrailerLoad::findOne( $id ) ) !== NULL ) {
        return $model;
      } else {
        throw new NotFoundHttpException( 'The requested page does not exist.' );
      }
    }
  }

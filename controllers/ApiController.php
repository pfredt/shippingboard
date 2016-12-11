<?php

  namespace app\controllers;

  use Yii;
  use app\models\TrailerLoad;
  use app\components\BasicController;
  use yii\helpers\Json;
  use yii\web\NotFoundHttpException;
  use yii\filters\AccessControl;

  /**
   * LoadController implements the CRUD actions for TrailerLoad model.
   */
  class ApiController extends BasicController {
    public function init() {
      Yii::$app->getResponse()->format = \yii\web\Response::FORMAT_JSON;

      parent::init();
    }

    public function actionGetDays( $jsonp = NULL ) {
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

      $days = [ ];

      if ( $items ) foreach ( $items as $key => $item ) {
        $start = mktime( 0, 0, 0 );
        $step = 60 * 60 * 24 - 1;
        for ( $i = 1; $i <= 9; $i++ ) {
          if ( $item->shipping_date >= $start && $item->shipping_date <= $start + $step ) {
            $days[$i][0] += $item->number_of_spas;
            $days[$i][1] += $item->number_of_swimspas;

            break;
          }

          $start += $step + 1;
        }
      }

      $text = "<table class=\"table\">
        <thead>
          <tr>
            <th>Day</th>
            <th>Spas</th>
            <th>Swim Spas</th>
          </tr>
        </thead>";
      $sum = [ 0, 0 ];
      $start = mktime( 0, 0, 0 );
      for ( $i = 1; $i <= 9; $i++ ) {
        $sum[0] += $days[$i][0];
        $sum[1] += $days[$i][1];
        $day = date( "N", $start );
        $text .= "
        <tr class=\"day" . $day . "\">
          <td>" . date( "l", $start ) . "</td>
          <td>" . $days[$i][0] . "</td>
          <td>" . $days[$i][1] . "</td>
        </tr>
        ";
        $start += 24 * 60 * 60;
      }
      $text .= "<tr><td><strong>Total:</strong></td><td>" . $sum[0] . "</td><td>" . $sum[1] . "</td></tr></table>";


      return [ 'html' => $text ];
    }

    public function actionGetInfo() {
      $text = "
      <h4 class=\"text-center\">" . date( "F Y" ) . "</h4>
  <h5 class=\"text-center\">MTD Spas: " . Yii::$app->params['config']['mtd_spas'] . " SwimSpas: " . Yii::$app->params['config']['mtd_swim_spas'] . "</h5>
  <table class=\"table text-center\">
    <thead>
      <tr>
        <th>% Increase</th>
        <th>Spas</th>
        <th>Swim Spas</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>0.00%</td>
        <td>" . Yii::$app->params['config']['last_spas'] . "</td>
        <td>" . Yii::$app->params['config']['last_swimspas'] . "</td>
      </tr>
      <tr>
        <td>5.00%</td>
        <td>" . floor( Yii::$app->params['config']['last_spas'] * 1.05 ) . "</td>
        <td>" . floor( Yii::$app->params['config']['last_swimspas'] * 1.05 ) . "</td>
      </tr>
      <tr>
        <td>10.00%</td>
        <td>" . floor( Yii::$app->params['config']['last_spas'] * 1.1 ) . "</td>
        <td>" . floor( Yii::$app->params['config']['last_swimspas'] * 1.1 ) . "</td>
      </tr>
      <tr>
        <td>20.00%</td>
        <td>" . floor( Yii::$app->params['config']['last_spas'] * 1.2 ) . "</td>
        <td>" . floor( Yii::$app->params['config']['last_swimspas'] * 1.2 ) . "</td>
      </tr>
      <tr>
        <td>30.00%</td>
        <td>" . floor( Yii::$app->params['config']['last_spas'] * 1.3 ) . "</td>
        <td>" . floor( Yii::$app->params['config']['last_swimspas'] * 1.3 ) . "</td>
      </tr>
      <tr>
        <td>40.00%</td>
        <td>" . floor( Yii::$app->params['config']['last_spas'] * 1.4 ) . "</td>
        <td>" . floor( Yii::$app->params['config']['last_swimspas'] * 1.4 ) . "</td>
      </tr>
      <tr>
        <td>50.00%</td>
        <td>" . floor( Yii::$app->params['config']['last_spas'] * 1.5 ) . "</td>
        <td>" . floor( Yii::$app->params['config']['last_swimspas'] * 1.5 ) . "</td>
      </tr>
    </tbody>
  </table>
      ";

      return [ 'html' => $text ];
    }

    public function actionGetCounts() {
      $loads = TrailerLoad::find()->orderBy( 'shipping_date asc' )->where( [ '>=', 'shipping_date', mktime( 0, 0, 0 ) - 365 * 24 * 60 * 60 ] )->andWhere( [ '<', 'shipping_date', mktime( 0, 0, 0 ) ] )->all();

      $data = [ ];

      $current = time();
      for ( $i = 0; $i < 12; $i++ ) {
        $data[date( 'Y-m', $current )]['spas'] = 0;
        $data[date( 'Y-m', $current )]['swim'] = 0;

        $current -= 31 * 24 * 60 * 60;
      }

      if ( $loads ) foreach ( $loads as $load ) {
        $time = $load->shipping_date;

        $data[date( 'Y-m', $time )]['spas'] += $load->number_of_spas;
        $data[date( 'Y-m', $time )]['swim'] += $load->number_of_swimspas;
      }

      ksort( $data );


      return $data;
    }


  }

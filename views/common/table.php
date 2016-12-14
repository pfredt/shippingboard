<?php
  $days = [ ];

  function writeColor( $index ) {
    return " background-color: " . Yii::$app->params['config']['day' . $index] . " ";
  }

  function writeHeading() {
    return " color: " . Yii::$app->params['config']['heading'] . "; font-weight: " . Yii::$app->params['config']['heading-weight'] . ";";
  }

?>

<style>
  .heading-style {
  <?= writeHeading(); ?>
  }

  <?php for($i = 1; $i < 10; $i++) { ?>
  .<?= "day".$i ?> td {
  <?= writeColor($i); ?>
  }

  <?php } ?>
  .main-table > tbody > tr > td {
    border-color: <?= Yii::$app->params['config']['border-color'] ?>;
  }
</style>

<div class="col-lg-10">
  <div
    style="position: absolute; right: -15px; height: 100%; width: 30px; background: <?= Yii::$app->params['config']['line-color']; ?>"></div>
  <table class="table main-table text-center">
    <thead>
      <tr>
        <th class="text-center heading-style">Processed Y/N</th>
        <th class="text-center heading-style">Shipping Date</th>
        <th class="text-center heading-style">Dealer</th>
        <th class="text-center heading-style">Spas</th>
        <th class="text-center heading-style">Swim Spas</th>
        <th class="text-center heading-style">Shipper</th>
        <th class="text-center heading-style">Shipment type</th>
        <th class="text-center heading-style">Status</th>
        <th class="text-center heading-style">Completed Y/N</th>
      </tr>
    </thead>
    <tbody>
      <?php if ( $items ) foreach ( $items as $key => $item ) {
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

        $day = date( "N", $item->shipping_date );
        $idd = uniqid();
        ?>

        <tr class="day<?= $day ?> <?= $idd ?>" style="font-weight: <?= $item->weight ?>">
          <td
            style="border-top-width: <?= $item->thinkness ?>px;"><?= $item->processed ? "<i class='glyphicon glyphicon-ok'></i>" : ""; ?></td>
          <td style="border-top-width: <?= $item->thinkness ?>px;"><?= date( "m/d/Y", $item->shipping_date ); ?></td>
          <td style="border-top-width: <?= $item->thinkness ?>px;"><?= $item->dealer; ?></td>
          <td style="border-top-width: <?= $item->thinkness ?>px;"><?= $item->number_of_spas; ?></td>
          <td style="border-top-width: <?= $item->thinkness ?>px;"><?= $item->number_of_swimspas; ?></td>
          <td style="border-top-width: <?= $item->thinkness ?>px;"><?= $item->shipper; ?></td>
          <td style="border-top-width: <?= $item->thinkness ?>px;"><?= $item->trailer_type; ?></td>
          <td
            style="border-top-width: <?= $item->thinkness ?>px;"><?= Yii::$app->params['status'][$item->status]; ?></td>
          <td
            style="border-top-width: <?= $item->thinkness ?>px;"><?= $item->completed ? "<i class='glyphicon glyphicon-ok'></i>" : ""; ?></td>
        </tr>
        <tr class="day<?= $day ?>">
          <td colspan="9" style="font-size: 16px;">
            &nbsp;
            <?php

              $all = "";

              $list_one = [ ];
              $names_spas = $item->getHotTubsToTrailerLoads();
              if ( $names_spas ) foreach ( $names_spas as $name_spas ) {
                $list_one[$name_spas->getHotTubModel()->one()->hot_tub_model_id]['name'] = $name_spas->getHotTubModel()->one()->hot_tub_model_name;
                $list_one[$name_spas->getHotTubModel()->one()->hot_tub_model_id]['count']++;
                $list_one[$name_spas->getHotTubModel()->one()->hot_tub_model_id]['serial_number'] = str_replace( "\r\n", "**", $name_spas->serial_number );
                $all .= str_replace( "\r\n", "**", $name_spas->serial_number ) . "**";
                //echo "<span class=\"label label-info\">" . $name_spas->getHotTubModel()->one()->hot_tub_model_name . "</span>&nbsp;";
              }

              if ( $list_one ) foreach ( $list_one as $vals ) {
                echo "<span class=\"label\" data-info=\"" . $vals['serial_number'] . "\" style=\"background: transparent; border: 2px solid " . Yii::$app->params['config']['spas-border-color'] . "; color: " . Yii::$app->params['config']['spas-color'] . "\">" . $vals['name'] . "&nbsp;&nbsp;&nbsp;(" . $vals['count'] . ")</span>&nbsp;";
              }

              $list_two = [ ];
              $names_swim_spas = $item->getSwimSpasToTrailerLoads();
              if ( $names_swim_spas ) foreach ( $names_swim_spas as $name_swim_spas ) {
                $list_two[$name_swim_spas->getSwimSpaModel()->one()->swim_spa_model_id]['name'] = $name_swim_spas->getSwimSpaModel()->one()->swim_spa_model_name;
                $list_two[$name_swim_spas->getSwimSpaModel()->one()->swim_spa_model_id]['count']++;
                $list_two[$name_swim_spas->getSwimSpaModel()->one()->swim_spa_model_id]['serial_number'] = str_replace( "\r\n", "**", $name_swim_spas->serial_number );
                $all .= str_replace( "\r\n", "**", $name_swim_spas->serial_number ) . "**";
                //echo "<span class=\"label label-success\">" . $name_swim_spas->getSwimSpaModel()->one()->swim_spa_model_name . "</span>&nbsp;";
              }

              if ( $list_two ) foreach ( $list_two as $vals ) {
                echo "<span class=\"label label-success\" data-info=\"" . $vals['serial_number'] . "\" style=\"background: transparent; border: 2px solid " . Yii::$app->params['config']['swim-spas-border-color'] . "; color: " . Yii::$app->params['config']['swim-spas-color'] . "\">" .
                        ((isset($vals['serial_number']) && $vals['serial_number'] !== "") ? "<b style='font-size:2.5em; position: relative; top: 13px;'>"."*&nbsp;"."</b>" : "")
                        . $vals['name'] . "&nbsp;&nbsp;&nbsp;(" . $vals['count'] . ")</span>&nbsp;";
              }

              //Requested to be removed
              //echo "<span class=\"label label-success\" data-info=\"" . $all . "\" style=\"background: transparent; border: 2px solid " . Yii::$app->params['config']['swim-spas-border-color'] . "; color: " . Yii::$app->params['config']['swim-spas-color'] . "\">All Numbers</span>&nbsp;";

            ?>
          </td>
        </tr>
        <tr class="day<?= $day ?>">
          <td colspan="9">
            &nbsp;
            <?= Yii::$app->user->isGuest ? "" : yii\helpers\Html::a( 'Update', [ 'load/update', 'id' => $item->trailer_load_id ], [ 'class' => 'btn btn-primary' ] ) . "&nbsp;&nbsp;&nbsp;" . yii\helpers\Html::a( 'Delete', [ 'load/delete', 'id' => $item->trailer_load_id ], [ 'class' => 'btn btn-danger' ] ); ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<div class="col-lg-2">
  <table class="table">
    <thead>
      <tr>
        <th>Day</th>
        <th>Spas</th>
        <th>Swim Spas</th>
      </tr>
    </thead>
    <?php $sum = [ 0, 0 ];
      $start = mktime( 0, 0, 0 );
      for ( $i = 1; $i <= 9; $i++ ) {
        $sum[0] += $days[$i][0];
        $sum[1] += $days[$i][1];
        $day = date( "N", $start );
        ?>
        <tr class="day<?= $day ?>">
          <td><?= date( "l", $start ); ?></td>
          <td><?= $days[$i][0] ?></td>
          <td><?= $days[$i][1] ?></td>
        </tr>
        <?php
        $start += 24 * 60 * 60;
      }
    ?>
    <tr>
      <td><strong>Total:</strong></td>
      <td><?= $sum[0] ?></td>
      <td><?= $sum[1] ?></td>
    </tr>
  </table>
  <hr>
  <h4 class="text-center"><?= date( "F Y" ) ?></h4>
  <h5 class="text-center">MTD Spas: <?= Yii::$app->params['config']['mtd_spas'] ?> SwimSpas: <?= Yii::$app->params['config']['mtd_swim_spas'] ?></h5>
  <table class="table text-center">
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
        <td><?= Yii::$app->params['config']['last_spas'] ?></td>
        <td><?= Yii::$app->params['config']['last_swimspas'] ?></td>
      </tr>
      <tr>
        <td>5.00%</td>
        <td><?= floor( Yii::$app->params['config']['last_spas'] * 1.05 ) ?></td>
        <td><?= floor( Yii::$app->params['config']['last_swimspas'] * 1.05 ) ?></td>
      </tr>
      <tr>
        <td>10.00%</td>
        <td><?= floor( Yii::$app->params['config']['last_spas'] * 1.1 ) ?></td>
        <td><?= floor( Yii::$app->params['config']['last_swimspas'] * 1.1 ) ?></td>
      </tr>
      <tr>
        <td>20.00%</td>
        <td><?= floor( Yii::$app->params['config']['last_spas'] * 1.2 ) ?></td>
        <td><?= floor( Yii::$app->params['config']['last_swimspas'] * 1.2 ) ?></td>
      </tr>
      <tr>
        <td>30.00%</td>
        <td><?= floor( Yii::$app->params['config']['last_spas'] * 1.3 ) ?></td>
        <td><?= floor( Yii::$app->params['config']['last_swimspas'] * 1.3 ) ?></td>
      </tr>
      <tr>
        <td>40.00%</td>
        <td><?= floor( Yii::$app->params['config']['last_spas'] * 1.4 ) ?></td>
        <td><?= floor( Yii::$app->params['config']['last_swimspas'] * 1.4 ) ?></td>
      </tr>
      <tr>
        <td>50.00%</td>
        <td><?= floor( Yii::$app->params['config']['last_spas'] * 1.5 ) ?></td>
        <td><?= floor( Yii::$app->params['config']['last_swimspas'] * 1.5 ) ?></td>
      </tr>
    </tbody>
  </table>
</div>

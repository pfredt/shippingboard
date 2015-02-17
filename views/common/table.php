<?php
  $days = [];

  function writeColor($index) {
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
  .table > tbody > tr > td { border-color: <?= Yii::$app->params['config']['border-color'] ?>; }
  .table .dealer-weight { font-weight: <?= Yii::$app->params['config']['dealer-weight'] ?>; }
  .table .trailer-weight { font-weight: <?= Yii::$app->params['config']['trailer-type-weight'] ?>; }
  .table .same-bottom td {border-bottom-width: <?= Yii::$app->params['config']['border-thinkness'] ?>px;}
  .table .same-top td {border-top-width: <?= Yii::$app->params['config']['border-thinkness'] ?>px;}
</style>

<div class="col-lg-10">
  <div style="position: absolute; right: -15px; height: 100%; width: 30px; background: <?= Yii::$app->params['config']['line-color']; ?>"></div>
  <table class="table text-center">
    <thead>
      <tr>
        <th class="text-center heading-style">Processed Y/N</th>
        <th class="text-center heading-style">Shipping Date</th>
        <th class="text-center heading-style">Dealer</th>
        <th class="text-center heading-style">Spas</th>
        <th class="text-center heading-style">Swim Spas</th>
        <th class="text-center heading-style">Shipper</th>
        <th class="text-center heading-style">Trailer type</th>
        <th class="text-center heading-style">Status</th>
        <th class="text-center heading-style">Completed Y/N</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($items) foreach ($items as $key => $item) { ?>

        <?php
        $start = mktime(0, 0, 0);
        $step = 60 * 60 * 24 - 1;
        for ($i = 1; $i <= 9; $i++) {
          if ($item->shipping_date >= $start && $item->shipping_date <= $start + $step) {
            $days[$i][0] += $item->number_of_spas;
            $days[$i][1] += $item->number_of_swimspas;

            break;
          }

          $start += $step + 1;
        }

        $day = date("N", $item->shipping_date);
        ?>

        <tr class="day<?= $day ?> <?= ( ($items[$key - 1]->shipping_date == $item->shipping_date || $items[$key + 1]->shipping_date == $item->shipping_date) ? "same-top" : "" )?>">
          <td><?= $item->processed ? "<i class='glyphicon glyphicon-ok'></i>" : "<i class='glyphicon glyphicon-remove'></i>"; ?></td>
          <td><?= date("m/d/Y", $item->shipping_date); ?></td>
          <td class="dealer-weight"><?= $item->dealer; ?></td>
          <td><?= $item->number_of_spas; ?></td>
          <td><?= $item->number_of_swimspas; ?></td>
          <td><?= $item->shipper; ?></td>
          <td class="trailer-weight"><?= $item->trailer_type; ?></td>
          <td><?= Yii::$app->params['status'][$item->status]; ?></td>
          <td><?= $item->completed ? "<i class='glyphicon glyphicon-ok'></i>" : ""; ?></td>
        </tr>
        <tr class="day<?= $day ?>">
          <td colspan="9" style="font-size: 16px;">
            &nbsp;
            <?php

              $list_one = [];
              $names_spas = $item->getHotTubsToTrailerLoads();
              if ($names_spas) foreach ($names_spas as $name_spas) {
                $list_one[$name_spas->getHotTubModel()->one()->hot_tub_model_id]['name'] = $name_spas->getHotTubModel()->one()->hot_tub_model_name;
                $list_one[$name_spas->getHotTubModel()->one()->hot_tub_model_id]['count']++;
                //echo "<span class=\"label label-info\">" . $name_spas->getHotTubModel()->one()->hot_tub_model_name . "</span>&nbsp;";
              }

              if ($list_one) foreach ($list_one as $vals) {
                echo "<span class=\"label\" style=\"background: transparent; border: 2px solid " . Yii::$app->params['config']['spas-border-color'] . "; color: " . Yii::$app->params['config']['spas-color'] . "\">" . $vals['name'] . "&nbsp;&nbsp;&nbsp;(" . $vals['count'] . ")</span>&nbsp;";
              }

              $list_two = [];
              $names_swim_spas = $item->getSwimSpasToTrailerLoads();
              if ($names_swim_spas) foreach ($names_swim_spas as $name_swim_spas) {
                $list_two[$name_swim_spas->getSwimSpaModel()->one()->swim_spa_model_id]['name'] = $name_swim_spas->getSwimSpaModel()->one()->swim_spa_model_name;
                $list_two[$name_swim_spas->getSwimSpaModel()->one()->swim_spa_model_id]['count']++;
                //echo "<span class=\"label label-success\">" . $name_swim_spas->getSwimSpaModel()->one()->swim_spa_model_name . "</span>&nbsp;";
              }

              if ($list_two) foreach ($list_two as $vals) {
                echo "<span class=\"label label-success\" style=\"background: transparent; border: 2px solid " . Yii::$app->params['config']['swim-spas-border-color'] . "; color: " . Yii::$app->params['config']['swim-spas-color'] . "\">" . $vals['name'] . "&nbsp;&nbsp;&nbsp;(" . $vals['count'] . ")</span>&nbsp;";
              }

            ?>
          </td>
        </tr>
        <tr class="day<?= $day ?> <?= ( ($items[$key - 1]->shipping_date == $item->shipping_date && $items[$key + 1]->shipping_date != $item->shipping_date) ? "same-bottom" : "" ) ?>">
          <td colspan="9">
            &nbsp;
            <?= Yii::$app->user->isGuest ? "" : yii\helpers\Html::a('Update', ['load/update', 'id' => $item->trailer_load_id], ['class' => 'btn btn-primary']) . "&nbsp;&nbsp;&nbsp;" . yii\helpers\Html::a('Delete', ['load/delete', 'id' => $item->trailer_load_id], ['class' => 'btn btn-danger']); ?>
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
    <?php $sum = [0, 0];
      $start = mktime(0, 0, 0);
      for ($i = 1; $i <= 9; $i++) {
        $sum[0] += $days[$i][0];
        $sum[1] += $days[$i][1];
        $day = $i;
        ?>
        <tr class="day<?= $day ?>">
          <td><?= date("l", $start); ?></td>
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
</div>

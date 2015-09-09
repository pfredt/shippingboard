<?php
  /* @var $this yii\web\View */
  /* @var $item app\models\TrailerLoad */
  /* @var $name_spas app\models\HotTubsToTrailerLoads */
  /* @var $name_swim_spas app\models\SwimSpasToTrailerLoads */
  /* @var $showCompleted boolean */
  /* @var $spas_total integer */
  /* @var $swim_total integer */

  $this->title = 'Trailer Master';

?>
<div class="site-index">

  <div class="row"  id="lists-container">
    <?= $this->render("//common/table", ['items' => $items, 'spas_total' => $spas_total, 'swim_total' => $swim_total]); ?>
  </div>
</div>

<div class="modal fade" id="show_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  <?php if($showCompleted) { ?>
  window.get = <?= $showCompleted ?>;
  <?php } ?>
</script>

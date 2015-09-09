<?php

use yii\helpers\Html,
  yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $item app\models\TrailerLoad */
/* @var $name_spas app\models\HotTubsToTrailerLoads */
/* @var $name_swim_spas app\models\SwimSpasToTrailerLoads */
/* @var $showCompleted boolean */

$this->title = 'Shipping Board';

?>
<div class="site-index">
  <?php $form = ActiveForm::begin(['id' => uniqid() . '-form']); ?>
  <div class="row">
    <div class="col-lg-4"><?= $form->field($model, 'from')->textInput(['maxlength' => 255, 'class' => 'datapicker form-control', 'value' => $model->from ? date("m/d/Y", $model->from) : ""]); ?></div>
    <div class="col-lg-4"><?= $form->field($model, 'to')->textInput(['maxlength' => 255, 'class' => 'datapicker form-control', 'value' => $model->to ? date("m/d/Y", $model->to) : ""]); ?></div>
    <div class="col-lg-4">
      <label>&nbsp;</label><br>
      <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
    </div>
  </div>
  <?php ActiveForm::end(); ?>

  <div class="row">
    <?= $this->render("//common/table", ['items' => $items]); ?>
  </div>
</div>
